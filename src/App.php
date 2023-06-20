<?php

namespace Source;

use Router\Router;
use Exceptions\RouteNotFoundException;

class App{

    public function __construct(private Router $router, private string $uri){
    }

    /**
     * Resolve the route and check if it exists.
     * @throws RouteNotFoundException
     * @return void
     */
    public function run() : void {
        try {
            echo $this->router->resolve($this->uri);
        } catch (RouteNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}