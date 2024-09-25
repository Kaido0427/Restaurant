<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\commande_menu;
use App\Models\menu;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\Image\Png;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Kkiapay\Kkiapay;

class clientController extends Controller
{

    public function enregistrerCommande(Request $request)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate([
                'panier' => 'required|array',
                'panier.*.id' => 'required|integer',
                'panier.*.nom' => 'required|string',
                'panier.*.prix' => 'required|numeric',
                'panier.*.quantite' => 'required|integer'
            ]);

            // Générer un ID client aléatoire
            $clientId = Str::upper(Str::random(7));

            // Créer une nouvelle commande
            $commande = commande::create([
                'client_id' => $clientId,
                'nom_client' => 'CLIENT',
                'montant' => array_sum(array_map(fn($item) => $item['prix'] * $item['quantite'], $validatedData['panier'])),
                'status' => 'Pending',
                'qr_code' => '' // QR Code sera généré et enregistré après la création de la commande
            ]);

            // Stocker l'ID de la commande en session
            $request->session()->put('commande_id', $commande->id);

            // Ajouter les éléments de la commande
            foreach ($validatedData['panier'] as $item) {
                commande_menu::create([
                    'commande_id' => $commande->id,
                    'menu_id' => $item['id'],
                    'quantity' => $item['quantite']
                ]);
            }


            return response()->json([
                'status' => 'Commande enregistrée avec succès.',
                'client_id' => $clientId,
                'panier' => $validatedData['panier'],
                'total_commande' => $commande->montant,
                'commande_id' => $commande->id
            ]);
        } catch (\Exception $e) {
            // Enregistrer l'erreur et renvoyer une réponse JSON
            Log::error('Erreur lors de l\'enregistrement de la commande.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Renvoyer une réponse JSON en cas d'erreur
            return response()->json([
                'status' => 'Une erreur est survenue lors de l\'enregistrement de la commande. Veuillez réessayer.',
                'error' => $e->getMessage()
            ], 500); // 500 pour indiquer une erreur serveur
        }
    }

    public function annulerCommande($id, Request $request)
    {
        try {
            $commande = commande::findOrFail($id);

            // Mettre à jour le statut de la commande
            $commande->update(['status' => $request->status]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'annulation de la commande.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['status' => 'error']);
        }
    }

    public function payOrder(Request $request)
    {
        try {
            // Initialiser Kkiapay
            $kkiapay = new Kkiapay(
                config('services.kkiapay.public_key'),
                config('services.kkiapay.private_key'),
                config('services.kkiapay.secret'),
                config('services.kkiapay.sandbox')
            );

            // Vérifier la transaction
            $transactionId = $request->input('transaction_id');
            $transaction = $kkiapay->verifyTransaction($transactionId);

            // Récupérer l'ID de la commande depuis la session
            $commandeId = $request->session()->get('commande_id');

            // Vérifier si les détails de la transaction sont valides
            if ($transaction && $transaction->status === 'SUCCESS') {
                // Trouver la commande
                $commande = commande::findOrFail($commandeId);

                // Mettre à jour le statut de la commande à "paid"
                $commande->update([
                    'status' => 'Paid',
                    'nom_client' => $transaction->client->fullname // Exemple d'extraction du nom du client
                ]);

                // URL de validation pour les serveurs du restaurant
                $qrCodeData = route('livraison', ['id' => $commande->id]);

                // Générer le QR code avec Endroid/qr-code
                $result = Builder::create()
                    ->writer(new PngWriter())
                    ->writerOptions([])
                    ->data($qrCodeData)
                    ->encoding(new Encoding('UTF-8'))
                    ->size(250)
                    ->margin(10)
                    ->build();

                // Chemin pour enregistrer le QR code
                $qrCodePath = 'qrCodes/' . $commande->id . '.png';
                $result->saveToFile(public_path($qrCodePath));

                // Mettre à jour la commande avec le chemin du QR code
                $commande->update(['qr_code' => $qrCodePath]);

                $message = "Votre commande a été payée avec succès. Pour finaliser votre commande, veuillez faire scanner le code QR par un serveur. Si vous souhaitez finaliser votre commande plus tard, notez le code client suivant : " . $commande->client_id . ".";

                return view('livraison', [
                    'message' => $message,
                    'qrCodePath' => $qrCodePath
                ]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Transaction non valide.']);
            }
        } catch (\Exception $e) {
            Log::error('Erreur lors de la vérification du paiement.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['status' => 'error', 'message' => 'Erreur serveur.']);
        }
    }


    public function getOrderDetails(Request $request)
    {
        try {
            // Récupérer l'ID du client depuis la requête
            $clientId = $request->input('client_id');

            // Trouver la commande correspondant à l'ID du client
            $commande = commande::where('client_id', $clientId)->first();

            if ($commande) {
                // Si le statut est "pending" ou "canceled", renvoyer les détails complets de la commande
                if (in_array($commande->status, ['pending', 'canceled'])) {
                    // Récupérer les menus associés à la commande
                    $commandeMenus = $commande->commandeMenus()->with('menu')->get();

                    // Calculer le montant total de la commande
                    $totalAmount = 0;
                    foreach ($commandeMenus as $commandeMenu) {
                        $totalAmount += $commandeMenu->menu->prix * $commandeMenu->quantity;
                    }

                    // Format de réponse pour une commande "pending" ou "canceled"
                    $response = [
                        'status' => true,
                        'commande_id' => $commande->id,
                        'client_id' => $commande->client_id,
                        'total_commande' => $totalAmount,
                        'panier' => $commandeMenus->map(function ($item) {
                            return [
                                'nom' => $item->menu->nom,
                                'prix' => $item->menu->prix,
                                'quantite' => $item->quantity
                            ];
                        })
                    ];

                    return response()->json($response);
                }
                // Si la commande a déjà été payée (statut autre que "pending" ou "canceled")
                else {
                    // Vérifier si le QR code existe
                    $qrCodeFileName = $commande->qr_code; // Assurez-vous que $commande->qr_code contient juste le nom du fichier (par exemple, '61.png')


                    // Vérifier si le fichier existe
                    if (file_exists($qrCodeFileName)) {
                        // Format de réponse pour une commande payée
                        return response()->json([
                            'status' => true,
                            'message' => 'Commande déjà payée. Veuillez vous rapprocher d\'un serveur pour finaliser.',
                            'qr_code' => url($qrCodeFileName) // URL du QR code
                        ]);
                    } else {
                        // Si le QR code est introuvable
                        return response()->json(['status' => false, 'message' => 'QR code introuvable pour cette commande.']);
                    }
                }
            } else {
                // Si aucune commande n'est trouvée avec cet ID de client
                return response()->json(['status' => false, 'message' => 'Commande introuvable.']);
            }
        } catch (\Exception $e) {
            // Gestion des exceptions en cas d'erreur serveur
            return response()->json(['status' => false, 'message' => 'Erreur serveur.']);
        }
    }

    public function finaliserCommande($id)
    {
        try {
            // Recherche de la commande
            $commande = commande::find($id);

            // Vérifier si la commande existe
            if ($commande) {
                // Mettre à jour le statut de la commande
                $commande->status = 'delivered'; // Marquer comme complétée ou tout autre statut nécessaire
                $commande->save();

                Log::info("Commande #{$id} finalisée avec succès.", ['commande' => $commande]);

                return redirect('/')->with('success', 'Commande finalisée avec succès.');
            } else {
                Log::warning("Commande #{$id} non trouvée.");

                return redirect('/')->with('error', 'Commande non trouvée.');
            }
        } catch (\Exception $e) {
            Log::error("Erreur lors de la finalisation de la commande #{$id}: " . $e->getMessage());

            return redirect('/')->with('error', 'Une erreur est survenue lors de la finalisation de la commande.');
        }
    }
}
