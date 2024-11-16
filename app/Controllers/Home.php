<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    // public function dashboard()
    // {
    //     // Vérifiez si l'utilisateur est connecté
    //     if (!session()->get('isLoggedIn')) {
    //         return redirect()->to('/login');
    //     }
    //     return view('home'); // Vue de la page d'accueil après connexion
    // }
}
