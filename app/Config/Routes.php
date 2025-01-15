<?php

use App\Controllers\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');

$routes->get('auth/regis', 'Auth::index');
$routes->post('auth/registrasi', 'Auth::regisAuth');
$routes->get('auth/login', 'Auth::login');

$routes->get('/', 'Auth::index', ['filter' => 'noauth']);
$routes->get('auth/regis', 'Auth::index', ['filter' => 'noauth']);
$routes->get('auth/login', 'Auth::login', ['filter' => 'noauth']);
$routes->post('auth/authenticate', 'Auth::authenticate', ['filter' => 'noauth']);
$routes->get('auth/page', 'Auth::page', ['filter' => 'auth']);
