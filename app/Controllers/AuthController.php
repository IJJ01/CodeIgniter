<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Display registration page
    public function register()
    {
        return view('auth/register');
    }

    // Handle registration
    public function registerPost()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role') ?? 'client', // Default role is 'client'
        ];

        // Validate input
        if (!$this->userModel->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        // Hash the password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Save user
        if ($this->userModel->save($data)) {
            return redirect()->to('/auth/login')->with('success', 'Registration successful. Please log in.');
        } else {
            return redirect()->back()->with('error', 'An error occurred during registration.');
        }
    }

    // Display login page
    public function login()
    {
        return view('auth/login');
    }

    // Handle login
    public function loginPost()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (!$username || !$password) {
            return redirect()->back()->with('error', 'All fields are required.');
        }

        // Find user by username
        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
            ]);

            // Redirect based on role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->to('/client/manage_requests')->with('success', 'Welcome, ' . $user['username'] . '!');
            }
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    // Log out the user
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logged out successfully.');
    }
}
