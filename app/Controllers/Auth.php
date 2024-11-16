<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController{
    
    // Afficher la page d'inscription
    public function register(){
        return view('auth/register');
    }

    // Méthode pour traiter le formulaire d'inscription
    public function registerPost(){
        // Charger le modèle UserModel
        $model = new UserModel();

        // Récupérer les données du formulaire
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password'); // Ajouter un champ pour le mot de passe dans le formulaire HTML

        // Validation des champs
        if (!$username || !$email || !$password) {
            return redirect()->back()->with('error', 'Tous les champs doivent être remplis.');
        }

        // Vérifier si l'email existe déjà
        if ($model->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Cet email est déjà utilisé.');
        }

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparer les données à insérer dans la base
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword, // Enregistrer le mot de passe hashé
        ];

        // Enregistrer l'utilisateur
        if ($model->save($data)) {
            return redirect()->to('/auth/login')->with('success', 'Inscription réussie, veuillez vous connecter.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'inscription.');
        }
    }

    // Afficher la page de connexion
    public function login(){
        return view('auth/login');
    }

    // Méthode pour traiter la connexion
    public function loginPost(){
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Validation des champs
        if (!$username || !$password) {
            return redirect()->back()->with('error', 'Tous les champs doivent être remplis.');
        }

        // Recherche de l'utilisateur par nom
        $user = $model->where('username', $username)->first();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie : créer des sessions pour l'utilisateur
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            return redirect()->to('/auth/main')->with('success', 'Bienvenue, ' . $user['username']);
        } else {
            return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect.');
        }
    }

    public function main(){
        return view('auth/main'); // Assurez-vous que le fichier de vue existe
    }
    public function MainPost(){
        // Récupérer les données du formulaire
        $name = $_POST['name'];
        $email = $_POST['email'];
        $product = $_POST['product'];
        $quantity = (int)$_POST['quantity'];

        // Définir les prix des produits
        $prices = [
            'A' => 100,
            'B' => 150,
            'C' => 200
        ];

        // Calculer le prix total avant réduction
        $productPrice = $prices[$product];
        $total = $productPrice * $quantity;

        // Appliquer une réduction si la quantité dépasse 10
        if ($quantity > 10) {
            $discount = 0.1; // 10% de réduction
            $total -= $total * $discount;
            $discountApplied = true;
        } else {
            $discountApplied = false;
        }

        // Afficher le récapitulatif de la commande
        echo "<h2>Récapitulatif de la commande</h2>";
        echo "Nom du client : " . ($nhtmlspecialcharsame) . "<br>";
        echo "Adresse e-mail : " . htmlspecialchars($email) . "<br>";
        echo "Produit choisi : Produit $product<br>";
        echo "Prix unitaire : " . $productPrice . " DH<br>";
        echo "Quantité : " . $quantity . "<br>";
        echo "Total : " . $total . " DH<br>";

        if ($discountApplied) {
            echo "<p>Une réduction de 10% a été appliquée.</p>";
        }


    }

}
