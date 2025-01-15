<?php

use App\Controllers\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('test-db', 'koneksi::index');
$routes->get('/', 'Auth::index');

$routes->get('auth/regis', 'Auth::index');
$routes->post('auth/registrasi', 'Auth::regisAuth');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/authenticate', 'Auth::authenticate');
$routes->get('auth/page', 'Auth::page');

// $routes->get('/', 'Auth::index', ['filter' => 'noauth']);
// $routes->get('auth/regis', 'Auth::index', ['filter' => 'noauth']);
// $routes->post('auth/registrasi', 'Auth::regisAuth', ['filter' => 'noauth']);
// $routes->get('auth/login', 'Auth::login', ['filter' => 'noauth']);
// $routes->post('auth/authenticate', 'Auth::authenticate', ['filter' => 'noauth']);
// $routes->get('auth/page', 'Auth::page', ['filter' => 'auth']);
