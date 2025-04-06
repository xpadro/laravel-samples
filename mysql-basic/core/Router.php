<?php

namespace core;

use core\middleware\Middleware;

class Router {
    protected array $routes = [];

    public function add($uri, $controller, $method): static
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function only($key) {
        // Update middleware for the last added route (the one where we add ->only()
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                // Apply the middleware
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }

                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }

    public function abort($code = 404): void
    {
        http_response_code($code);

        require basePath("views/{$code}.php");

        die();
    }
}
