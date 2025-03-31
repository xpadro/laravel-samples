<?php

namespace core;

use Exception;

class Container
{
    protected array $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("Binding not found for key: {$key}");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}