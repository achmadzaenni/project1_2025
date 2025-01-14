<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');

// Regis Routes
$routes->group('regis', function($routes){
    $routes->add('/', 'Auth::regis');
    $routes->add('auth', 'Auth::regisAuth');
});