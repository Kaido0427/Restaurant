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
                $qrCodeData = route('deliver.order', ['id' => $commande->id]);

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

                $message = "Votre commande a été payée avec succès. Veuillez scanner le code QR avec un serveur pour finaliser la commande. Prenez une capture d'écran au cas où vous souhaiteriez le faire plus tard.";

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


    public function livrerCommande($id)
    {
        try {
            // Vérifier que l'utilisateur est connecté
            if (!auth()->check()) {
                return redirect()->route('index')->with('error', 'Vous devez être connecté pour livrer la commande.');
            }

            // Récupérer la commande par son ID
            $commande = commande::findOrFail($id);

            // Mettre à jour le statut de la commande à "delivered"
            $commande->update(['status' => 'delivered']);

            return redirect()->route('index')->with('success', 'Commande livrée avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la livraison de la commande.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('index')->with('error', 'Erreur lors de la livraison de la commande.');
        }
    }

    public function getOrderDetails(Request $request)
    {
        try {
            // Retrieve the client ID from the request
            $clientId = $request->input('client_id');

            // Find the order based on the client ID
            $commande = commande::where('client_id', $clientId)->first();

            if ($commande) {
                // Fetch the order details with related menus
                $commandeMenus = $commande->commandeMenus()->with('menu')->get();

                // Calculate the total amount for the order
                $totalAmount = 0;
                foreach ($commandeMenus as $commandeMenu) {
                    $totalAmount += $commandeMenu->menu->prix * $commandeMenu->quantity;
                }

                // Format the response with order details
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
            } else {
                return response()->json(['status' => false, 'message' => 'Commande introuvable.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Erreur serveur.']);
        }
    }
}
