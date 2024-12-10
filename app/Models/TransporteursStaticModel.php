<?php
namespace App\Models;

use CodeIgniter\Model;

class TransporteursStaticModel extends Model
{
    protected $table = 'transporteurs_static';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'capacity_kg', 'location', 'contact_info', 'description'];
}
