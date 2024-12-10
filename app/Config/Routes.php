<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('client/create_request', 'ClientController::createRequest');
$routes->post('client/create_request', 'ClientController::createRequest');
$routes->get('client/manage_requests', 'ClientController::manageRequests');
$routes->get('client/request_details/(:num)', 'ClientController::requestDetails/$1');
$routes->get('client/delete_request/(:num)', 'ClientController::deleteRequest/$1');
$routes->get('client/edit_request/(:num)', 'ClientController::editRequest/$1');
$routes->post('client/update_request/(:num)', 'ClientController::updateRequest/$1');
$routes->get('client/search_services', 'ClientController::searchServices');
$routes->post('client/search_results', 'ClientController::searchResults');
$routes->get('client/request_pdf/(:num)', 'ClientController::requestPdf/$1');


