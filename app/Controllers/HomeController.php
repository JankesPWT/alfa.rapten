<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

class HomeController
{
    public function index($vars)
    {
        View::make('index');
    }
    public function jeden($vars)
    {
        echo '1';
    }
    public function dwa($vars)
    {
        echo '2';
    }

    
}