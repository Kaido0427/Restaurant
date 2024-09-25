<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class menuController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,wepb|max:2048',
        ]);

        try {
            // Création du menu
            $menu = new Menu();
            $menu->nom = $request->input('nom');
            $menu->description = $request->input('description');
            $menu->prix = $request->input('prix');

            // Gestion de l'image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('menus');
                $image->move($imagePath, $imageName);
                $menu->image = 'menus/' . $imageName;
            }

            // Sauvegarde du menu
            $menu->save();

            // Retour avec succès
            return redirect()->back()->with('success', 'Menu ajouté avec succès.');
        } catch (\Exception $e) {
            // Enregistrement dans les logs avec le message d'erreur
            Log::error('Erreur lors de l\'ajout du menu: ' . $e->getMessage(), [
                'nom' => $request->input('nom'),
                'description' => $request->input('description'),
                'prix' => $request->input('prix'),
                'image' => $request->file('image') ? $request->file('image')->getClientOriginalName() : 'Aucune image',
            ]);

            // Retour avec message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du menu. Veuillez réessayer.');
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu non trouvé.');
        }

        $menu->nom = $request->input('nom');
        $menu->description = $request->input('description');
        $menu->prix = $request->input('prix');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($menu->image && file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('menus');
            $image->move($imagePath, $imageName);
            $menu->image = 'menus/' . $imageName;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu mis à jour avec succès.');
    }


    public function delete($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu non trouvé.');
        }

        // Supprimer l'image associée
        if ($menu->image && file_exists(public_path($menu->image))) {
            unlink(public_path($menu->image));
        }

        $menu->delete();

        return redirect()->back()->with('success', 'Menu supprimé avec succès.');
    }
}
