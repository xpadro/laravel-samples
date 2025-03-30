<?php

use core\Router;

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/
require BASE_PATH . 'core/functions.php';

// Loads requested classes that have not yet been explicitly required (e.g. Database or Validator)
spl_autoload_register(function ($class) {
    // Example of $class as input param: core\Database
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$result}.php");
});

$router = new Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);