<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('token', "Login::getToken");
$routes->get("home", "Home::index");
$routes->get('/logout', 'Login::logout');

//Page Form
$routes->get('/formfasilitas', 'Form_fasilitas::index');
$routes->get('/formtender', 'Form_tender::index');

$routes->get("listtiket", "List_Tiket::index"); //Read data Form keseluruhan

$routes->get("listtiket/detailtiket/(:num)", "List_Tiket::detail_tiket/$1"); //Read data Form 

//CRUD FORM TENDER
$routes->post("createTender", "Form_tender::SubmitForm", ['as' => 'create-formTender']);
$routes->get("listtiket/editTender/(:num)", "Form_tender::editformtender/$1", ['as' => 'edit-formTender']);
$routes->post("updateTender/(:num)", "Form_tender::updateFormTender/$1", ['as' => 'update-formTender']);
$routes->get("listtiket/deleteTender/(:num)", "Form_tender::deletetiket/$1", ['as' => 'delete-formTender']);
