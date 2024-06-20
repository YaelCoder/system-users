<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('users-list', 'Home::userList');
$routes->get('add-users', 'Home::addUsers');
$routes->get('address', 'Home::address');
$routes->get('user-type', 'Home::userType');

$routes->get('getAddress', 'AddressController::index');

$routes->get('getUserType', 'UserTypeController::index');

$routes->get('get-users', 'UserController::getUsers');
$routes->post('store-users', 'UserController::storeUsers');
$routes->get('reportList', 'UserController::reportList');

$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');
