<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'Client';
    protected $primaryKey = 'Id';
    protected $allowedFields = [
        'Email', 
        'Mot_de_passe', 
        'Nom', 
        'Prenom', 
        'Age', 
        'Ville', 
        'Numero_de_telephone', 
        'Profession', 
        'Personne_Id',
        'reset_token',
        'reset_token_expires_at'
    ];
    protected $useTimestamps = false; // Activer si vous avez des colonnes created_at et updated_at
}
