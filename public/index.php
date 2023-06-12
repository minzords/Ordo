<?php

use Source\App;
use Router\Router;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$router = new Router();

$router->register('/', ['Controllers\HomeController', 'index']);
$router->register('/aujourd\'hui', ['Controllers\HomeController', 'today']);
$router->register('/demain', ['Controllers\HomeController', 'tomorrow']);

(new App($router, $_SERVER['REQUEST_URI']))->run();