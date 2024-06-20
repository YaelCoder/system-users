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
$routes->post('storeAddress', 'AddressController::store');

$routes->get('getUserType', 'UserTypeController::index');
$routes->post('storeUserType', 'UserTypeController::store');

$routes->get('get-users', 'UserController::getUsers');
$routes->post('store-users', 'UserController::storeUsers');
$routes->get('reportList', 'UserController::reportList');
$routes->put('/edit-user/(:num)', 'UserController::editUser/$1');

$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');
