<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function abort() {
    http_response_code(404);

    $heading = 'Not found';
    require 'views/404.php';

    die();
}

function isUrl($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}