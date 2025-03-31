<?php

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

function login($user) {
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    // Security measure to regenerate de sessionId
    session_regenerate_id(true);
}

function logout() {
    // Destroy session
    $_SESSION = [];
    session_destroy();

    // Destroy client cookie
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}