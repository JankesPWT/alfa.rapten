<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

class ArtistController
{
    public function index($vars) : View
    {
        // print_r($vars);

        return View::make('artist/index');
    }

    public static function show()
    {
        return View::make('artist/show');
    }

    public static function view($vars)
    {
        //

    }
}