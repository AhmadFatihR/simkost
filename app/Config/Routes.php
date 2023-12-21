<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //User Routes
$routes->get('/', 'Home::index', ['filter' => 'isPenghuni']);
$routes->get('/komplain', 'Home::Komplain', ['filter' => 'isPenghuni']);
$routes->get('/history', 'Home::history',['filter' => 'isPenghuni']);

//Admin Routes
$routes->get('/admin', 'Admin::index', ['filter' => 'isAdmin']);
//Admin Routes Kamar
$routes->get('/kamar', 'Kamar::index', ['filter' => 'isAdmin']);
$routes->post('kamar', 'Kamar::index', ['filter' => 'isAdmin']);
$routes->post('/kamar/save', 'Kamar::save', ['filter' => 'isAdmin']);
$routes->delete('/kamar/delete/(:num)', 'Kamar::delete/$1', ['filter' => 'isAdmin']);
$routes->post('/kamar/update', 'Kamar::update', ['filter' => 'isAdmin']);
//Admin Routes Penghuni
$routes->get('/penghuni', 'Penghuni::index', ['filter' => 'isAdmin']);
$routes->post('/penghuni', 'Penghuni::index', ['filter' => 'isAdmin']);
$routes->post('/penghuni/save', 'Penghuni::save', ['filter' => 'isAdmin']);
$routes->delete('/penghuni/delete/(:num)','Penghuni::delete/$1', ['filter' => 'isAdmin']);
$routes->get('/penghuni/update','Penghuni::update', ['filter' => 'isAdmin']);

$routes->get('/laporan', 'Admin::laporan', ['filter' => 'isAdmin']);

$routes->get('/komplain_user', 'Admin::komplain', ['filter' => 'isAdmin']);
//Admin Routes Akun
$routes->get('/akun_user', 'Akun::index', ['filter' => 'isAdmin']);
$routes->post('/akun_user', 'Akun::index', ['filter' => 'isAdmin']);
$routes->post('/akun_user/save', 'Akun::save', ['filter' => 'isAdmin']);
$routes->delete('/akun_user/delete/(:num)', 'Akun::delete/$1', ['filter' => 'isAdmin']);
$routes->get('akun_user/update', 'Akun::update', ['filter' => 'isAdmin']);

//Routes Login
$routes->get('/login', 'Login::Index');
$routes->post('/login/prosesLogin','Login::prosesLogin');


