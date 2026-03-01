<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home page
$routes->get('/', 'Takeaways::index');

// Takeaways list
$routes->get('takeaways', 'Takeaways::index');

// Create takeaway form
$routes->get('takeaways/create', 'Takeaways::create');

// Store takeaway (POST)
$routes->post('takeaways/store', 'Takeaways::store');

// Delete takeaway (POST)
$routes->post('takeaways/delete/(:num)', 'Takeaways::delete/$1');

// Single takeaway
$routes->get('takeaways/(:num)', 'Takeaways::show/$1');