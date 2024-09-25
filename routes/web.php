<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\menuController;
use App\Models\commande;
use App\Models\menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $menus = menu::all();

    return view('index', compact('menus'));
});

Auth::routes();

Route::get('/menus', [clientController::class, 'showMenus']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save-commande', [clientController::class, 'enregistrerCommande']);
route::post('/cancel-commande/{id}', [clientController::class, 'annulerCommande']);
Route::get('/pay/callback', [clientController::class, 'payOrder']);
route::get('/get-order-details', [clientController::class, 'getOrderDetails']);


Route::get('/livraison/{id}', function ($id) {
    $commande = commande::find($id);

    if ($commande) {
        // Vérifier le statut de la commande
        if (in_array($commande->status, ['delivered', 'pending', 'canceled'])) {
            $message = '';
            switch ($commande->status) {
                case 'delivered':
                    $message = "Cette commande a déjà été livrée.";
                    break;
                case 'pending':
                    $message = "Cette commande est encore en attente.";
                    break;
                case 'canceled':
                    $message = "Cette commande a été annulée.";
                    break;
            }
            // Rediriger vers la page d'accueil avec un message approprié
            return redirect('/')->with('error', $message);
        }

        $commandeMenus = $commande->commandeMenus()->with('menu')->get();
        $totalAmount = $commandeMenus->sum(fn($item) => $item->menu->prix * $item->quantity);
        $message = "Votre commande a été payée avec succès. Pour finaliser votre commande, veuillez faire scanner le code QR par un serveur. Si vous souhaitez finaliser votre commande plus tard, notez le code client suivant : " . $commande->client_id . ".";

        return view('livraison', [
            'commande' => $commande,
            'commandeMenus' => $commandeMenus,
            'totalAmount' => $totalAmount,
            'message' => $message,
            'qrCodePath' => 'qrCodes/' . $commande->qr_code
        ]);
    } else {
        // Si la commande n'est pas trouvée
        abort(404, 'Commande non trouvée');
    }
})->name('livraison');


// web.php
Route::post('/finaliser-commande/{id}', [ClientController::class, 'finaliserCommande'])
    ->middleware('auth')
    ->name('finaliser-commande');


// Route pour stocker un nouveau menu
Route::post('/menus/store', [menuController::class, 'store'])->name('menus.store');

// Route pour mettre à jour un menu existant
Route::put('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');

// Route pour supprimer un menu
Route::delete('/menus/delete/{id}', [MenuController::class, 'delete'])->name('menus.destroy');
