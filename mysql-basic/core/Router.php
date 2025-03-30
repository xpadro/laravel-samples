<?php

namespace core;

class Router {
    protected array $routes = [];

    public function add($uri, $controller, $method): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller): void
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller): void
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function route($uri, $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                require basePath($route['controller']);
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
