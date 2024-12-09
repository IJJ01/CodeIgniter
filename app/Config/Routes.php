<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Home', 'Home::homepage');
$routes->get('/OfferForm','Home::makeoffer');
$routes->get('/OfferDetails','Home::offrepage');
$routes->get('/PendingOffers','Home::pendingoffers');