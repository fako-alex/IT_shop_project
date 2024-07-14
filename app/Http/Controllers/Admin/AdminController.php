<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Utilisation correcte de Hash
use App\Models\User;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::where('is_admin', 1)->get(); // Utilisation de where pour récupérer les administrateurs
        $data['header_title'] = 'Admin';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Ajouter nouveau admin'; // Correction du titre
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email' // Validation correcte pour l'insertion
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Utilisation correcte de Hash pour le mot de passe
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::findOrFail($id); // Utilisation de findOrFail pour récupérer un utilisateur par ID
        $data['header_title'] = 'Modifier utilisateur';
        return view('admin.admin.edit', $data);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id); // Utilisation de findOrFail pour récupérer un utilisateur par ID
        $user->delete(); // Méthode delete() pour supprimer l'utilisateur
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id // Validation correcte pour la mise à jour
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->status = $request->status;
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Utilisateur modifié avec succès');
    }
    
}
