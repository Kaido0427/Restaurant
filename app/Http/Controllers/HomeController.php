<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $menus = menu::all();
        $commandes = Commande::all();
        // Récupérer la somme des montants des commandes avec le statut "paid"
        $totalMontantPaye = commande::whereIn('status', ['paid', 'delivered'])->sum('montant');

        $pendingCommandes = commande::where('status', 'pending')->get();
        $paidCommandes = commande::where('status', 'paid')->get();
        $paidCommandes = commande::where('status', 'paid')->get();
        $canceledCommandes = commande::where('status', 'canceled')->get();
        $deliveredCommandes = commande::where('status', 'delivered')->get();
        // Passer la somme à la vue
        return view('home', compact('menus','totalMontantPaye', 'commandes', 'pendingCommandes', 'paidCommandes', 'canceledCommandes', 'deliveredCommandes'));
    }
}
