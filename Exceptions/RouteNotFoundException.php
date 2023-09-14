<?php

namespace Exceptions;

use Exception;

class RouteNotFoundException extends Exception
{
    /**
     * Display the error message when the route is not found
     *
     * @var string
     */
    protected $message = 'Cette route n\'existe pas.';
}
