<?php

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
$routes->post('/kamar/save', 'Kamar::save');

$routes->get('/penghuni', 'Admin::penghuni');

$routes->get('/laporan', 'Admin::laporan');

$routes->get('/komplain_user', 'Admin::komplain');

$routes->get('/akun_user', 'Admin::akun');

//Routes Login
$routes->get('/login', 'Login::Index');


