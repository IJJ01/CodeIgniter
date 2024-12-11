<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // Fields allowed for mass assignment
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'role'
    ];

    // Optional: Add validation rules (if needed)
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'role' => 'in_list[admin,client]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'This email is already in use.'
        ],
        'role' => [
            'in_list' => 'Invalid role selected.'
        ]
    ];
}
