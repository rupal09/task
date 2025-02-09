<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/register', 'Auth::register');
$routes->post('/register-user', 'Auth::registerUser');

$routes->get('/login', 'Auth::login');
$routes->post('/login-user', 'Auth::loginUser');

$routes->get('/logout', 'Auth::logout');

$routes->group('tasks', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Task::index');
    $routes->get('create', 'Task::create');
    $routes->post('store', 'Task::store');
    $routes->get('complete/(:num)', 'Task::updateStatus/$1');
    $routes->get('delete/(:num)', 'Task::delete/$1');
});

