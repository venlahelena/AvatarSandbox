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
$routes->get('logout', 'AuthController::logout');

$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::dashboard');

$routes->get('profile', 'ProfileController::index');
$routes->get('avatar/edit', 'AvatarController::edit');
$routes->post('avatar/update', 'AvatarController::update');

$routes->post('pet/rename', 'PetController::rename');
$routes->post('pet/interact/(:segment)', 'PetController::interact/$1');
$routes->get('pet/select', 'PetSelectController::index');
$routes->post('pet/select/choose', 'PetSelectController::choose');
