<?php

namespace App;

class Router
{
    private array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public function get(string $uri, array|callable $route): void
    {
        $this->routes["GET"][$uri] = $route;
    }

    public function post(string $uri, array|callable $route): void
    {
        $this->routes["POST"][$uri] = $route;
    }

    public function dispatch(string $uri, string $method): string
    {
        $callback = $this->routes[$method][$uri] ?? null;

        if (!$callback) {
            http_response_code(404);
            return "NADA ENCONTRADO.";
        }

        if (is_callable($callback)) {
            return $callback();
        }

        if (is_array($callback)) {
            [$class, $method] = $callback;

            $controller = new $class();
            return $controller->$method();
        }

        throw new Exception();
    }
}
