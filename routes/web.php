<?php

use App\Http\Controllers\clientController;
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
route::get('/commande/livraison/{id}',[clientController::class, 'livrerCommande'] )->middleware('auth')->name('deliver.order');
route::get('/get-order-details',[clientController::class,'getOrderDetails']);
