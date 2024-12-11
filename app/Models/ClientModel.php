<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'prenom', 'age', 'ville', 'compte_id'];
}