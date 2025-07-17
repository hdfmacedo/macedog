<?php
namespace App\Helpers;

/**
 * Simple router for mapping URIs to controller actions.
 */
class Router
{
    private array $routes = [];

    public function get(string $uri, callable $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, callable $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = strtok($uri, '?');
        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}
