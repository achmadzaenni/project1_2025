<?php

use App\Controllers\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index', ['filter' => 'noauth']);
$routes->get('auth/regis', 'Auth::index', ['filter' => 'noauth']);
$routes->get('auth/login', 'Auth::login', ['filter' => 'noauth']);
$routes->post('auth/authenticate', 'Auth::authenticate', ['filter' => 'noauth']);
$routes->get('auth/page', 'Auth::page', ['filter' => 'auth']);