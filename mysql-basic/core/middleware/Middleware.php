<?php

namespace core\middleware;

use Exception;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key) {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        if (!$middleware) {
            throw new Exception("Middleware [$key] not defined");
        }

        (new $middleware)->handle();
    }

}