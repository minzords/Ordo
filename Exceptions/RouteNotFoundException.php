<?php

namespace Exceptions;


class RouteNotFoundException extends \Exception
{
    /**
     * Display the error message when the route is not found
     * @var string
     */
    protected $message = 'Cette route n\'existe pas.';
}