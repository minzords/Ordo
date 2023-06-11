<?php

namespace Source;

use Router\Router;
use Exceptions\RouteNotFoundException;

class App{

    public function __construct(private Router $router, private string $uri){
    }

    public function run(){
        try {
            echo $this->router->resolve($this->uri);
        } catch (RouteNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}