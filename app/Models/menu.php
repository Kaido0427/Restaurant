<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $table = "menus";

    protected $fillable = ['nom', 'description', 'prix', 'image'];

    public function commandeMenus()
    {
        return $this->hasMany(commande_menu::class);
    }
}
