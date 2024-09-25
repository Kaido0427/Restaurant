<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande_menu extends Model
{
    use HasFactory;

    protected $table = "commande_menus";

    protected $fillable = ['commande_id', 'menu_id', 'quantity'];

    public function commande()
    {
        return $this->belongsTo(commande::class);
    }

    public function menu()
    {
        return $this->belongsTo(menu::class);
    }
}
