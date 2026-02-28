<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home page
$routes->get('/', 'Home::index');

// Foods list page
$routes->get('foods', 'Foods::index');

// Individual food page
$routes->get('foods/(:segment)', 'Foods::show/$1');