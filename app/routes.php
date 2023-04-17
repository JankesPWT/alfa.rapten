<?php

use App\Controllers\HomeController;
use App\Controllers\ArtistController;

# TODO ogarnąć ukośnik na końcu url
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    
    $r->get('/artist', [ArtistController::class, 'index']);
    $r->get('/artist/{id:\d+}', [ArtistController::class, 'show']); // {id} must be a number (\d+)
    //$r->get('/user/{id:\d+}[/{title}]', 'get_article_handler'); // The /{title} suffix is optional
});