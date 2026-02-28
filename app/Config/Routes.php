<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home page
$routes->get('/', 'Takeaways::index');

// Takeaways list
$routes->get('takeaways', 'Takeaways::index');

// Single takeaway
$routes->get('takeaways/(:num)', 'Takeaways::show/$1');