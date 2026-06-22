<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require_once __DIR__ . '/../app/core/Database.php';

require_once __DIR__ . '/../app/core/Router.php';

require_once __DIR__ . '/../app/models/DepartmentModel.php';
require_once __DIR__ . '/../app/models/SystemModel.php';

require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/SystemController.php';
require_once __DIR__ . '/../app/controllers/DepartmentController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

require_once __DIR__ . '/../app/helpers/functions.php';


$router = new Router();

$router->get('/', function () {
    $controller = new DashboardController();
    $controller->index();
});

$router->get('/login', function () {
    echo 'Login Page';
});

$router->get('/users', function () {
    echo 'Users Page';
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

$router->get('/users/create', function () {
    $controller = new UserController();
    $controller->create();
});


$router->dispatch();