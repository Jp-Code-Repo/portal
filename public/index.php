<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once __DIR__ . '/../app/core/Autoloader.php';
require_once __DIR__ . '/../app/helpers/functions.php';

use App\Core\Autoloader;
use App\Core\Router;

use App\Controllers\DashboardController;
use App\Controllers\DepartmentController;
use App\Controllers\SystemController;
use App\Controllers\UserController;

Autoloader::register();

$router = new Router();

$router->get('/', function () {
    $controller = new DashboardController();
    $controller->index();
});

$router->get('/login', function () {
    echo 'Login Page';
});

$router->get('/systems', function () {
    $controller = new SystemController();
    $controller->index();
});

$router->get('/systems/create', function () {
    $controller = new SystemController();
    $controller->create();
});

$router->post('/systems/store', function () {
    $controller = new SystemController();
    $controller->store();
});

$router->get('/departments', function () {
    $controller = new DepartmentController();
    $controller->index();
});

$router->get('/departments/create', function () {
    $controller = new DepartmentController();
    $controller->create();
});

$router->post('/departments/store', function () {
    $controller = new DepartmentController();
    $controller->store();
});

$router->get('/users', function () {
    $controller = new UserController();
    $controller->index();
});

$router->get('/users/create', function () {
    $controller = new UserController();
    $controller->create();
});

$router->post('/users/store', function () {
    $controller = new UserController();
    $controller->store();
});

$router->dispatch();