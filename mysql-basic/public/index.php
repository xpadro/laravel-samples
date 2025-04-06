<?php

use core\Router;
use core\Session;
use core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/
require BASE_PATH . 'core/functions.php';

// Loads requested classes that have not yet been explicitly required (e.g. Database or Validator)
spl_autoload_register(function ($class) {
    // Example of $class as input param: core\Database
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$result}.php");
});

require basePath('bootstrap.php');

$router = new Router();

$routes = require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    // PRG (Post Redirect Get)
    Session::flash('errors', $exception->getErrors());
    Session::flash('old', $exception->getOld());

    redirect($_SERVER['HTTP_REFERER'] ?? '/');
}

// Delete custom 'flash' session data, meant to be available for just one request
Session::unflash();