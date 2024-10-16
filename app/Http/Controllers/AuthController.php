<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;  // Correction : import correct de Hash
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

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
        return redirect('');
    }

    // public function auth_login(Request $request){
    //     // Valider les entrées
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:8',
    //     ]);
    //     // vérifier si la personne a selectionné remember
    //     $remember = !empty($request->is_remember) ? true : false;
    //     // Vérifier si l'utilisateur existe et si le mot de passe est correct
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>0, 'is_delete'=>0], $remember)) {
    //         if(!empty(Auth::user()->email_verified_at)){
    //             $json['status'] = true;
    //             $json['message'] = 'success';
    //         }else{
    //             $save = User::getSingle((Auth::user()->id));
    //             Mail::to($save->email)->send(new RegisterMail($save));
    //             Auth::logout();
    //             $json['status'] = false;
    //             $json['message'] = 'Votre compte n\'est pas vérifier. Veuillez consulter votre boite mail.';
    //         }
    //     } else {
    //         $json['status'] = false;
    //         $json['message'] = 'Email ou mot de passe incorrect';
    //     }
    //     echo json_encode($json);
    // }

    public function auth_login(Request $request)
{
    // Valider les entrées
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    // Vérifier si "remember me" est sélectionné
    $remember = !empty($request->is_remember);

    // Récupérer l'utilisateur via l'email
    $user = User::where('email', $request->email)->first();

    // Vérifier si l'utilisateur existe
    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'Utilisateur non trouvé.',
        ]);
    }

    // Vérifier si l'utilisateur est actif et non supprimé
    if ($user->status != 0 || $user->is_delete != 0) {
        return response()->json([
            'status' => false,
            'message' => 'Votre compte est inactif ou a été supprimé.',
        ]);
    }

    // Vérifier si le mot de passe est correct
    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Mot de passe incorrect.',
        ]);
    }

    // Tenter l'authentification
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        // Vérifier si l'email est confirmé
        if (!empty($user->email_verified_at)) {
            return response()->json([
                'status' => true,
                'message' => 'success',
            ]);
        } else {
            // Envoyer un e-mail de confirmation
            Mail::to($user->email)->send(new RegisterMail($user));

            // Déconnecter l'utilisateur
            Auth::logout();

            return response()->json([
                'status' => false,
                'message' => 'Votre compte n\'est pas vérifié. Veuillez consulter votre boite mail.',
            ]);
        }
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Email ou mot de passe incorrect',
        ]);
    }
}


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
            return response()->json(['message' => 'Ce compte est déjà utilisée.'], 400);
        }
    
        // Créer un nouvel utilisateur
        $save = new User();
        $save->name = trim($request->input('name'));
        $save->email = trim($request->input('email'));
        $save->password = Hash::make($request->input('password'));

        $save->is_admin = 0; // 0 signifie utilisateur classique, 1 pour admin
        $save->status = 0; // 0 signifie que l'utilisateur doit être activé
        $save->is_delete = 0;
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));
    
        return response()->json(['message' => 'Compte créé avec succès! Consulter votre boite mail pour confirmer votre identité.'], 201);
    }
    
    public function active_email($id){
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect(url(''))->with('success', "Compte vérifier avec succès.");
    }

    
}
