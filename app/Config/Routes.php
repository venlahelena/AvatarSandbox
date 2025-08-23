<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerPost');
$routes->get('testDb', 'UserController::testDb');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginPost');

$routes->get('dashboard', 'Home::index');
