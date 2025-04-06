<?php

use core\Session;
use JetBrains\PhpStorm\NoReturn;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

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

function authorize($condition, $status = 403) {
    if (!$condition) {
        abort($status);
    }

    return true;
}

function abort($code = 404): void
{
    http_response_code($code);

    require basePath("views/{$code}.php");

    die();
}

function redirect($url) {
    header("location: $url");
    exit();
}

function old($key, $default = '')
{
    return get('old')[$key] ?? $default;
}

function get($key, $default = null)
{
    return Session::get($key);
}