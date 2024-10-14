<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;  // Correction : import correct de Hash
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login_admin(){
       // dd(Hash::make(12345678)); #afficher le mot de passe 12345678 de l'administrateur.

        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request){ 
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin'=> 1, 'status'=>0, 'is_delete'=>0], $remember )){
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect');
        }
    } 

    public function logout_admin(){
        Auth::logout();
        return redirect('admin');
    }

    // public function auth_register(Request $request){
    //     $checkEmail = User::checkEmail($request->email);

    //     if(empty($checkEmail)){
    //         $save = new User;
    //         $save->name = trim($request->name);
    //         $save->email = trim($request->email);
    //         $save->password = Hash::make($request->password); // Utilisation correcte de Hash
    //         $save->save();

    //         $json['status'] = true;
    //         $json['message'] = 'Votre compte a été créé avec succès.';

    //         return redirect()->back()->with('success', 'Votre inscription a été effectuée avec succès. Vous pouvez vous connecter maintenant.');
    //     }else{
    //         $json['status'] = false;
    //         $json['message'] = 'Cette adresse email est déjà utilisée.';
    //     }
    //     echo json_encode($json);
    // }

    public function auth_register(Request $request)
    {
        // Valider les entrées
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Vérifier si l'email existe déjà
        $existingUser = User::where('email', $request->email)->first();
    
        if ($existingUser) {
            // Si l'email existe déjà, renvoyer une réponse d'erreur
            return response()->json(['message' => 'Cette adresse email est déjà utilisée.'], 400);
        }
    
        // Créer un nouvel utilisateur
        $save = new User();
        $save->name = trim($request->input('name'));
        $save->email = trim($request->input('email'));
        $save->password = Hash::make($request->input('password')); // Utiliser Hash pour hacher le mot de passe
        $save->save();
    
        // Réponse de succès
        return response()->json(['message' => 'Utilisateur créé avec succès!'], 201);
    }
    

    
}
