<?php
namespace App\Models;

use CodeIgniter\Model;

class AnnonceModel extends Model
{
    protected $table = 'annonce';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'type_de_marchandise', 
        'tonnage', 
        'ville_depart', 
        'ville_arriver', 
        'date', 
        'commentaire', 
        'client_id', 
        'status'
    ];
}
