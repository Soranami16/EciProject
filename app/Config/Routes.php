<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('token', "Login::login");
$routes->get("home", "Home::index");
$routes->get('/logout', 'Login::logout');

//Approve & Reject 
$routes->post('process-approval/(:num)', 'List_Tiket::processApproval/$1');
$routes->post('process-reject/(:num)', 'List_Tiket::processApproval/$1');

//PageMasterUser
$routes->get('/masteruser', 'Master::MasterUser'); //ini viewnya 
$routes->get('/masteruser/master', 'Master::MasterUsers'); //ini untuk read datanya
$routes->get("/masteruser/createform", "Master::FormUser");
$routes->post("/masteruser/create", "Master::SubmitUser");
$routes->get("/masteruser/edit/(:num)", "Master::EditUser/$1"); //ini buat tampilannya
$routes->post("/masteruser/update/(:num)", "Master::UpdateUser/$1"); //ini buat fungsi nya
$routes->post("/masteruser/delete/(:num)", "Master::DeleteUser/$1");

//PageMasterStore
$routes->get('/masterstore', 'Master::MasterStore'); //ini viewnya 
$routes->get('/masterstore/master', 'Master::MasterStores'); //ini untuk read datanya
$routes->get("/masterstore/createform", "Master::FormStore");
$routes->post("/masterstore/create", "Master::SubmitStore");
$routes->get("/masterstore/edit/(:num)", "Master::EditStore/$1"); //ini buat tampilannya
$routes->post("/masterstore/update/(:num)", "Master::UpdateStore/$1"); //ini buat fungsi nya
$routes->post("/masterstore/delete/(:num)", "Master::DeleteStore/$1");

//PageMasterStoreLocation
$routes->get('/masterstorelocation', 'Master::MasterStoreLocation'); //ini viewnya 
$routes->get('/masterstorelocation/master', 'Master::MasterStoreLocations'); //ini untuk read datanya
$routes->get("/masterstorelocation/createform", "Master::FormStoreLocation");
$routes->post("/masterstorelocation/create", "Master::SubmitStoreLocation");
$routes->get("/masterstorelocation/edit/(:num)", "Master::EditStoreLocation/$1"); //ini buat tampilannya
$routes->post("/masterstorelocation/update/(:num)", "Master::UpdateStoreLocation/$1"); //ini buat fungsi nya
$routes->post("/masterstorelocation/delete/(:num)", "Master::DeleteStoreLocation/$1");

//Page Notif
$routes->get('/lonceng', 'Home::lonceng');
$routes->get('/notifikasi', 'Home::notifikasi'); //ini buat tampilannya
$routes->get('/notifikasi/histori', 'Home::histori'); //ini buat fungsinya

//Page List Tiket
$routes->get("listtiket", "List_Tiket::index",); //ini buat tampilannya
$routes->get("listtiket/list", "List_Tiket::listtiket",); //ini buat fungsi nya
$routes->get("listtiket/detailtiket/(:num)", "List_Tiket::detail_tiket/$1"); //Read data detail
$routes->post("pdfcontroller/generate/(:num)", 'PdfController::generateModalPdf/$1'); // ini pdf belum bisa cuy

//CRUD FORM TENDER
$routes->get('/formtender', 'Form_tender::index'); //ini tampilannya 
$routes->post("createTender", "Form_tender::SubmitForm", ['as' => 'create-formTender']);
$routes->get("listtiket/editTender/(:num)", "Form_tender::editformtender/$1", ['as' => 'edit-formTender']); //ini buat tampilannya
$routes->post("updateTender/(:num)", "Form_tender::updateFormTender/$1", ['as' => 'update-formTender']); //ini buat fungsi nya
$routes->post("listtiket/deleteTender/(:num)", "Form_tender::deletetiket/$1", ['as' => 'delete-formTender']);
