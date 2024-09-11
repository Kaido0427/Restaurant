<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;

    protected $table = "commandes";

    protected $fillable = ['client_id', 'nom_client', 'montant', 'status', 'qr_code'];

    public function commandeMenus()
    {
        return $this->hasMany(commande_menu::class);
    }

    public function meals()
    {
        return $this->hasManyThrough(menu::class, commande_menu::class);
    }
}
