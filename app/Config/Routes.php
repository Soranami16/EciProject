<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/formfasilitas', 'Form_fasilitas::index');
$routes->get('/formtender', 'Form_tender::index');
$routes->post('token', "Login::getToken");
$routes->get('/Users', 'Login::getData');
$routes->get("home", "Home::index");
$routes->get('/formtender', 'Form_tender::index');

$routes->get("listtiket", "Tiket::index");
$routes->post("createTiket", "Form_tender::SubmitForm");
$routes->get("listtiket/detailtiket/(:num)", "Tiket::detail_tiket/$1");
$routes->get("listtiket/deletetiket/(:num)", "Tiket::deletetiket/$1");
$routes->get("listtiket/edittiket/(:num)", "Tiket::edittiket/$1");

$routes->group("listtiket", "Tiket::index", function ($routes) {
    $routes->get("/detailtiket/(:num)", "Tiket::detail_tiket/$1");
    $routes->get("/deletetiket/(:num)", "Tiket::deletetiket/$1");
    $routes->get("/edittiket/(:num)", "Tiket::edittiket/$1");
});
