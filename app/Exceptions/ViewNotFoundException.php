<?php

namespace App\Exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = 'widoku ni ma';
    protected $code = 404;
    
    public function __construct()
    {
        echo $this->message;
    }
}