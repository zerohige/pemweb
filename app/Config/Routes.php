<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Semua::index');
 $routes->get('/artikel', 'Semua::artikel');
 $routes->get('/artikelbaca', 'Semua::artikelbaca');
 $routes->get('/daftar', 'Semua::daftar');
 //$routes->get('/resep', 'Semua::resep');
 $routes->get('/konsultasi', 'Semua::konsultasi');
 $routes->get('/login', 'Semua::login');
 $routes->post('user/daftar', 'User::daftar');
 $routes->get('user/dashboard_user', 'Semua::dashboard_user');
 $routes->get('logout','Api\UserController::logout');
$routes->get('/jadwal-konsultasi','Semua::jadwal_konsultasi');
$routes->get('/admin/dashboard','Semua::dashboard_admin');
$routes->get('/testi','Semua::Test_resep');
$routes->get('/admin/daftar-resep','ResepController::list_admin');



 #Daftar Api
 
 $routes->post('api/register', 'Api\UserController::register');#Api untuk regis akun
 $routes->post('api/login', 'Api\UserController::loginuser');#Api untuk login
 $routes->post('api/reservasi', 'Api\UserController::PesanReservasi');
 $routes->get('/api/getreservasi', 'Api\UserController::getAllReservasi');
 $routes->get('/api/getreservasiuser', 'Api\UserController::getReservasiByUser');
 $routes->delete('/api/deletereservasi/(:num)', 'Api\UserController::deleteReservasi/$1');
 $routes->post('/api/regisadmin','Api\AdminController::regis_admin');
 $routes->post('/api/loginadmin','Api\AdminController::loginadmin');
 $routes->post('api/resep', 'ResepController::create'); 
 $routes->delete('/api/resep/delete/(:num)', 'ResepController::delete/$1');
 $routes->post('/api/resep/update/(:num)', 'ResepController::update/$1');


 $routes->post('admin/api/SetujuReservation/(:num)', 'Api\AdminController::accReservation/$1');
 $routes->post('admin/api/doneReservation/(:num)', 'Api\AdminController::doneReservation/$1');







 $routes->get('/resep/form', 'ResepController::form'); // Form untuk tambah resep
$routes->get('/resep/form/(:num)', 'ResepController::form/$1'); // Form untuk edit resep
$routes->get('/resep', 'ResepController::list');





