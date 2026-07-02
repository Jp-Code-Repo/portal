<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, callable $callback): void
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post(string $uri, callable $callback): void
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $basePath = '/portal/public';

        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }

        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
            return;
        }

        http_response_code(404);

        echo '404 - Page Not Found';
    }
}