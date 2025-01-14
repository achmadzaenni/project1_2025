<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('auth/regis', 'Auth::index');
$routes->get('auth/login', 'Auth::login');
