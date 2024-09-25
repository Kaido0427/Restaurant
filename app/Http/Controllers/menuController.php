<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class menuController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = new menu();
        $menu->nom = $request->input('nom');
        $menu->description = $request->input('description');
        $menu->prix = $request->input('prix');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('menus');
            $image->move($imagePath, $imageName);
            $menu->image = 'menus/' . $imageName;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
