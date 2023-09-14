<?php

use Router\Router;
use Source\App;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

/**
 * Initalize the router
 */
$router = new Router;

/**
 * Web routes
 */
$router->register('/', ['Controllers\HomeController', 'index']);
$router->register('/aujourd\'hui', ['Controllers\HomeController', 'today']);
$router->register('/demain', ['Controllers\HomeController', 'tomorrow']);
$router->register('/mois', ['Controllers\HomeController', 'month']);

/**
 * Resolve routes
 */
(new App($router, $_SERVER['REQUEST_URI']))->run();
