<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'MainController::index');
$routes->get('/save', 'MainController::save');
$routes->get('/delete/(:num)', 'MainController::delete/$1');
$routes->get('/edit/(:num)', 'MainController::edit/$1');
