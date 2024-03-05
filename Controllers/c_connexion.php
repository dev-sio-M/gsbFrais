<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Visiteur;

class c_connexion extends Controller
{
    public function demandeConnexion()
    {
        return view('visiteurMedical.v_connexion');
    }

    public function valideConnexion(Request $request)
    {
        $credentials = $request->only('login', 'mdp');

        $user = Visiteur::where('login', $credentials['login'])->first();

        if (!$user || $credentials['mdp'] !== $user->mdp) {
            return back()->withErrors(['login_error' => 'Identifiants invalides. Veuillez réessayer.']);
        }

        Auth::login($user);

        // Enregistrement des valeurs dans la session
        Session::put('prenom', $user->prenom);
        Session::put('nom', $user->nom);

        return redirect('/visiteurMedical/v_sommaire');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Vous avez été déconnecté.');
    }
}
