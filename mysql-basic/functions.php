<?php

use JetBrains\PhpStorm\NoReturn;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function abort(): void
{
    http_response_code(404);

    $heading = 'Not found';
    require 'views/404.php';

    die();
}

function isUrl($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function basePath($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes); // Extracts each item into a variable in this scope
    require basePath('views/' . $path);
}