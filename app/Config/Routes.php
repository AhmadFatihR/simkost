<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //User Routes
$routes->get('/', 'Home::index');
$routes->get('/komplain', 'Home::Komplain');
$routes->get('/history', 'Home::history');

//Admin Routes
$routes->get('/admin', 'Admin::index');
//Admin Routes Kamar
$routes->get('/kamar', 'Kamar::index');
$routes->post('kamar', 'Kamar::index');
$routes->post('/kamar/save', 'Kamar::save');
$routes->delete('/kamar/delete/(:num)', 'Kamar::delete/$1');
$routes->post('/kamar/update', 'Kamar::update');
//Admin Routes Penghuni
$routes->get('/penghuni', 'Penghuni::index');
$routes->post('/penghuni/save', 'Penghuni::save');
$routes->delete('/penghuni/delete/(:num)','Penghuni::delete/$1');
$routes->get('/penghuni/update','Penghuni::update');

$routes->get('/laporan', 'Admin::laporan');

$routes->get('/komplain_user', 'Admin::komplain');
//Admin Routes Akun
$routes->get('/akun_user', 'Akun::index');
$routes->post('/akun_user/save', 'Akun::save');
$routes->delete('/akun_user/delete/(:num)', 'Akun::delete/$1');
$routes->get('akun_user/update', 'Akun::update');

//Routes Login
$routes->get('/login', 'Login::Index');


