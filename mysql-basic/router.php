<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}