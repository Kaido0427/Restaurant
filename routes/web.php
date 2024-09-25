<?php

use App\Http\Controllers\clientController;
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
        $commandeMenus = $commande->commandeMenus()->with('menu')->get();
        $totalAmount = $commandeMenus->sum(fn($item) => $item->menu->prix * $item->quantity);
        
        return view('livraison', [
            'commande' => $commande,
            'commandeMenus' => $commandeMenus, 
            'totalAmount' => $totalAmount,
            'qrCodePath' => 'qrCodes/' . $commande->qr_code
        ]);
    } else {
        abort(404, 'Commande non trouvée');
    }
})->name('livraison');

// web.php
Route::post('/finaliser-commande/{id}', [ClientController::class, 'finaliserCommande'])
    ->middleware('auth')
    ->name('finaliser-commande');
