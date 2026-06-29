<?php

namespace App;

use function App\helpers\view;

class Router
{
    private array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public function get(string $uri, array|callable $route): void
    {
        $this->routes["GET"][] = [
            "uri" => $uri,
            "callback" => $route,
        ];
    }

    public function post(string $uri, array|callable $route): void
    {
        $this->routes["POST"][] = [
            "uri" => $uri,
            "callback" => $route,
        ];
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes[$method] as $route) {
            $pattern = $this->convertUriToRegex($route["uri"]);

            if (preg_match($pattern, $uri, $matches)) {
                $params = $this->getParams($matches);
                return $this->execute($route["callback"], $params);
            }
        }

        http_response_code(404);
        return view("404");
    }

    private function convertUriToRegex(string $uri): string
    {
        $pattern = preg_quote($uri, "#");

        $pattern = preg_replace_callback(
            "#\\\\\{([a-zA-Z_][a-zA-Z0-9_]*)\\\\\}#",
            fn($matches) => "(?P<{$matches[1]}>[^/]+)",
            $pattern,
        );

        return "#^{$pattern}$#";
    }

    private function getParams(array $matches): array
    {
        return array_filter(
            $matches,
            fn($key) => is_string($key),
            ARRAY_FILTER_USE_KEY,
        );
    }

    private function execute(array|callable $callback, array $params)
    {
        if (is_callable($callback)) {
            return $callback(...$params);
        }

        if (is_array($callback)) {
            [$class, $action] = $callback;

            $controller = new $class();

            return $controller->$action(...$params);
        }

        throw new Exception("Rota inválida.");
    }
}
