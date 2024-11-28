<?php

namespace App\Models;

use CodeIgniter\Model;

class TransporteurModel extends Model
{
    protected $table = 'Transporteur';
    protected $primaryKey = 'Id';
    protected $allowedFields = [
        'Email', 
        'Mot_de_passe', 
        'Nom', 
        'Prenom', 
        'Age', 
        'Ville', 
        'Numero_de_telephone', 
        'Nombre_camion', 
        'Personne_Id'
    ];
    protected $useTimestamps = false;
}
