<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes de base
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::dashboard');

// Routes pour l'authentification
$routes->get('auth/login', 'Auth::login'); // Formulaire de connexion
$routes->get('login', 'Auth::login'); 
$routes->post('auth/loginPost', 'Auth::loginPost'); // Traiter la connexion

$routes->get('auth/register', 'Auth::register'); // Formulaire d'inscription
$routes->get('register', 'Auth::register'); 
$routes->post('auth/registerPost', 'Auth::registerPost'); // Traiter l'inscription

// $routes->get('auth/main', 'Auth::main'); // Exemple d'autre page
// $routes->get('main', 'Auth::main'); 
$routes->get('auth/main', 'Auth::main');
$routes->get('main', 'Auth::main'); 
$routes->post('auth/MainPost', 'Auth::MainPost'); // Traiter l'inscription
