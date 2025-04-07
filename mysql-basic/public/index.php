<?php

use core\Router;
use core\Session;
use core\ValidationException;

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/

// Loads autoload.php, which will load classes located in the defined 'core' and 'http' folders
// Command 'composer dump-autoload' will create the mapping in vendor/composer/autoload_psr4.php
require BASE_PATH . 'vendor/autoload.php';


session_start();

require BASE_PATH . 'core/functions.php';

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