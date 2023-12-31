<?php

namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    /**
     * Register a route and its action.
     */
    public function register(string $path, callable|array $action): void
    {
        $this->routes[$path] = $action;
    }

    /**
     * Resolve the route and check if it exists.
     *
     * @throws RouteNotFoundException
     */
    public function resolve(string $uri): mixed
    {
        $path = explode('?', $uri)[0];
        $action = $this->routes[$path] ?? null;

        if (is_callable($action)) {
            return $action();
        }

        if (is_array($action)) {
            [$className, $method] = $action;

            if (class_exists($className) && method_exists($className, $method)) {
                $class = new $className;

                return call_user_func_array([$class, $method], []);
            }
        }

        throw new RouteNotFoundException;
    }
}
