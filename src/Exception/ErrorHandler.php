<?php

namespace MartiAdrogue\Scrapper\Exception;

use ErrorException;

class ErrorHandler
{
    public function __construct()
    {
        # code...
    }

    public function setUpEnvironment()
    {
        ini_set('log_errors', 1);
        ini_set('display_errors', 0);
        set_error_handler(array($this, 'toExceptions'));
    }

    public function toExceptions($errno, $errstr, $errfile, $errline)
    {
        throw new ErrorException($errstr, $errno, $errno, $errfile, $errline);
    }
}
