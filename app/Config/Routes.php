<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/formfasilitas', 'Form_fasilitas::index');
$routes->get('/formtender', 'Form_tender::index');
$routes->post('token', "Login::getToken");
$routes->get('/Users', 'Login::getData');
$routes->get("home", "Home::index");
$routes->get('/formtender', 'Form_tender::index');
$routes->get("listtiket", "Tiket::index");
$routes->get("listtiket/detailtiket/(:num)", "Tiket::detail_tiket/$1");

// $routes->group("api", function ($routes) {
//     $routes->get("home", "Home::index", ['filter' => 'auth']);
// });
