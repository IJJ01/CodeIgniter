<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('client/create_request', 'ClientController::createRequestView');
$routes->post('client/create_request/post', 'ClientController::createRequest');
$routes->get('client/manage_requests', 'ClientController::manageRequests');
$routes->get('client/request_details/(:num)', 'ClientController::requestDetails/$1');
$routes->get('client/delete_request/(:num)', 'ClientController::deleteRequest/$1');
$routes->get('client/edit_request/(:num)', 'ClientController::editRequest/$1');
$routes->post('client/update_request/(:num)', 'ClientController::updateRequest/$1');
$routes->get('client/search_services', 'ClientController::searchServices');
$routes->post('client/search_results', 'ClientController::searchResults');
$routes->get('client/request_pdf/(:num)', 'ClientController::requestPdf/$1');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/manage_clients', 'AdminController::manageClients');
$routes->get('admin/add_client', 'AdminController::addClient'); 
$routes->post('admin/add_client', 'AdminController::addClient');
$routes->get('/admin/edit_client/(:num)', 'AdminController::editClient/$1');
$routes->post('/admin/update_client/(:num)', 'AdminController::updateClient/$1'); 
$routes->get('admin/delete_client/(:num)', 'AdminController::deleteClient/$1');



