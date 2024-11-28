<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientModel;
use App\Models\TransporteurModel;

class Auth extends BaseController{
    
    // Afficher la page d'inscription
    public function register(){
        return view('auth/register');
    }
    public function registerPost()
{
    // Chargement des requêtes et sessions
    $request = service('request');
    $session = session();

    // Récupérer les données du formulaire
    $nom = $request->getPost('nom');
    $prenom = $request->getPost('prenom');
    $age = $request->getPost('age');
    $ville = $request->getPost('ville');
    $numtele = $request->getPost('numtele');
    $email = $request->getPost('email');
    $password = $request->getPost('password');
    $passwordConf = $request->getPost('passwordconf');
    $role = $request->getPost('role');

    // Validation des données
    if ($password !== $passwordConf) {
        $session->setFlashdata('error', 'Les mots de passe ne correspondent pas.');
        return redirect()->back()->withInput();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $session->setFlashdata('error', 'Email invalide.');
        return redirect()->back()->withInput();
    }

    if (!is_numeric($age) || (int)$age <= 0) {
        $session->setFlashdata('error', 'Âge invalide.');
        return redirect()->back()->withInput();
    }

    if (!is_numeric($numtele)) {
        $session->setFlashdata('error', 'Numéro de téléphone invalide.');
        return redirect()->back()->withInput();
    }

    // Hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrement dans la base de données
    if ($role === 'client') {
        $clientModel = new ClientModel();
        $data = [
            'Nom' => $nom,
            'Prenom' => $prenom,
            'Age' => $age,
            'Ville' => $ville,
            'Numero_de_telephone' => $numtele,
            'Email' => $email,
            'Mot_de_passe' => $hashedPassword,
        ];
        $clientModel->insert($data);

        // Envoi de l'email de bienvenue
        $this->sendWelcomeEmail($email, $prenom);
    } elseif ($role === 'transporteur') {
        $transporteurModel = new TransporteurModel();
        $data = [
            'Nom' => $nom,
            'Prenom' => $prenom,
            'Age' => $age,
            'Ville' => $ville,
            'Numero_de_telephone' => $numtele,
            'Email' => $email,
            'Mot_de_passe' => $hashedPassword,
            'Nombre_camion' => 0, // Par défaut, aucun camion
        ];
        $transporteurModel->insert($data);
    } else {
        $session->setFlashdata('error', 'Rôle invalide.');
        return redirect()->back()->withInput();
    }

    // Redirection après succès
    $session->setFlashdata('success', 'Inscription réussie ! Vous pouvez vous connecter.');
    return redirect()->to(base_url('auth/login'));
}
private function sendWelcomeEmail($email, $prenom)
{
    $emailService = \Config\Services::email();

    // Configuration de base de l'email
    $emailService->setTo($email);
    $emailService->setFrom('courtitransport2@gmail.com', 'Votre Application');
    $emailService->setSubject('Bienvenue sur notre plateforme');
    
    // Corps de l'email
    $message = "
        <p>Bonjour $prenom,</p>
        <p>Merci de vous être inscrit sur notre plateforme. Nous sommes ravis de vous accueillir parmi nous !</p>
        <p>Cordialement,<br>L'équipe de Votre Application</p>
    ";
    $emailService->setMessage($message);

    // Envoi de l'email
    if (!$emailService->send()) {
        log_message('error', 'Échec de l\'envoi de l\'email : ' . $emailService->printDebugger(['headers']));
    }
}

    public function login(){
        return view('auth/login');
    }
    public function loginPost()
    {
        // Chargement des requêtes et sessions
        $request = service('request');
        $session = session();

        // Récupération des données du formulaire
        $email = $request->getPost('email');
        $password = $request->getPost('password');

        // Validation des données
        if (empty($email) || empty($password)) {
            $session->setFlashdata('error', 'Tous les champs sont obligatoires.');
            return redirect()->back()->withInput();
        }

        // Vérification si l'utilisateur est un client
        $clientModel = new ClientModel();
        $client = $clientModel->where('Email', $email)->first();

        if ($client) {
            // Vérification du mot de passe
            if (password_verify($password, $client['Mot_de_passe'])) {
                // Enregistrement des informations dans la session
                $session->set('user', [
                    'id' => $client['Id'],
                    'nom' => $client['Nom'],
                    'prenom' => $client['Prenom'],
                    'role' => 'client',
                ]);
                return redirect()->to(base_url('client/dashboard'));
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect.');
                return redirect()->back()->withInput();
            }
        }

        // Vérification si l'utilisateur est un transporteur
        $transporteurModel = new TransporteurModel();
        $transporteur = $transporteurModel->where('Email', $email)->first();

        if ($transporteur) {
            // Vérification du mot de passe
            if (password_verify($password, $transporteur['Mot_de_passe'])) {
                // Enregistrement des informations dans la session
                $session->set('user', [
                    'id' => $transporteur['Id'],
                    'nom' => $transporteur['Nom'],
                    'prenom' => $transporteur['Prenom'],
                    'role' => 'transporteur',
                ]);
                return redirect()->to(base_url('transporteur/dashboard'));
            } else {
                $session->setFlashdata('error', 'Mot de passe incorrect.');
                return redirect()->back()->withInput();
            }
        }

        // Si aucun utilisateur n'est trouvé
        $session->setFlashdata('error', 'Aucun compte trouvé avec cet email.');
        return redirect()->back()->withInput();
    }
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }
    public function forgotPasswordPost()
{
    $request = service('request');
    $session = session();

    $email = $request->getPost('email');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $session->setFlashdata('error', 'Adresse email invalide.');
        return redirect()->back()->withInput();
    }

    // Vérifier si l'utilisateur existe
    $clientModel = new ClientModel();
    $user = $clientModel->where('Email', $email)->first();

    if (!$user) {
        $session->setFlashdata('error', 'Adresse email introuvable.');
        return redirect()->back()->withInput();
    }
// Générer un token unique et sa date d'expiration
    $token = bin2hex(random_bytes(32)); // 64 caractères
    $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour')); // 1 heure de validité

    // Sauvegarder le token dans la base de données
    $db = \Config\Database::connect();
    $builder = $db->table('Client');

    // Mise à jour du token pour l'utilisateur spécifique
    $updated = $builder->where('Id', $user['Id'])->update([
        'reset_token' => $token,
        'reset_token_expires_at' => $expiresAt,
    ]);

    if (!$updated) {
        log_message('error', 'Erreur lors de la mise à jour du token pour l\'utilisateur ID ' . $user['Id']);
        throw new \Exception('Impossible de mettre à jour le token de réinitialisation.');
    }

    // Envoyer l'email de réinitialisation
    $this->sendResetEmail($email, $token);

    $session->setFlashdata('success', 'Un email de réinitialisation a été envoyé.');
    return redirect()->to(base_url('auth/reset_password'));
}

private function sendResetEmail($email, $token)
{
    $emailService = \Config\Services::email();

    $resetLink = base_url("auth/reset-password?token=$token");

    $emailService->setTo($email);
    $emailService->setFrom('courtitransport2@gmail.com', 'Votre Application');
    $emailService->setSubject('Réinitialisation de mot de passe');
    $emailService->setMessage("
        <p>Bonjour,</p>
        <p>Vous avez demandé une réinitialisation de votre mot de passe. Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe :</p>
        <p><a href=\"$resetLink\">Réinitialiser mon mot de passe</a></p>
        <p>Ce lien expirera dans 1 heure.</p>
        <p>Si vous n'avez pas fait cette demande, ignorez cet email.</p>
    ");

    if (!$emailService->send()) {
        log_message('error', 'Échec de l\'envoi de l\'email de réinitialisation : ' . $emailService->printDebugger(['headers']));
    }
}
public function resetPasswordPost()
{
    $request = service('request');
    $session = session();

    // Récupération des données du formulaire
    $token = $request->getPost('token');
    $password = $request->getPost('password');
    $passwordConf = $request->getPost('passwordconf');

    // Validation des mots de passe
    if ($password !== $passwordConf) {
        $session->setFlashdata('error', 'Les mots de passe ne correspondent pas.');
        return redirect()->back()->withInput();
    }

    if (strlen($password) < 8) {
        $session->setFlashdata('error', 'Le mot de passe doit contenir au moins 8 caractères.');
        return redirect()->back()->withInput();
    }

    // Vérification du token dans la base de données
    $clientModel = new ClientModel();
    $user = $clientModel->where('reset_token', $token)
                        ->where('reset_token_expires_at >=', date('Y-m-d H:i:s'))
                        ->first();

    if (!$user) {
        $session->setFlashdata('error', 'Lien de réinitialisation invalide ou expiré.');
        return redirect()->to(base_url('auth/forgot-password'));
    }

    // Hashage du nouveau mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Mise à jour du mot de passe et suppression du token
    $clientModel->update($user['Id'], [
        'Mot_de_passe' => $hashedPassword,
        'reset_token' => null,
        'reset_token_expires_at' => null,
    ]);

    // Message de succès et redirection
    $session->setFlashdata('success', 'Votre mot de passe a été réinitialisé avec succès.');
    return redirect()->to(base_url('auth/login'));
}

// private function sendResetEmail($email, $token)
// {
//     $emailService = \Config\Services::email();

//     $emailService->setTo($email);
//     $emailService->setFrom('courtitransport2@gmail.com', 'Votre Application');
//     $emailService->setSubject('Réinitialisation de votre mot de passe');

//     $resetLink = base_url("auth/reset-password/$token");
//     $message = "
//         <p>Bonjour,</p>
//         <p>Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe :</p>
//         <p><a href=\"$resetLink\">Réinitialiser mon mot de passe</a></p>
//         <p>Si vous n'avez pas demandé cette action, ignorez cet email.</p>
//     ";

//     $emailService->setMessage($message);

//     if (!$emailService->send()) {
//         log_message('error', 'Échec de l\'envoi de l\'email : ' . $emailService->printDebugger(['headers']));
//     }
// }

}
