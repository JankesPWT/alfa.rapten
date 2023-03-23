<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;
use App\Controllers\HomeController;
use App\Controllers\ArtistController;

/* DOTENV */
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/* CONSTANS */
define('VIEW_PATH', __DIR__ . '/../app/Views');

/* ROUTER */
# TODO ogarnąć ukośnik na końcu url
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    
    $r->get('/artist', [ArtistController::class, 'index']);
    $r->get('/artist/{id:\d+}', [ArtistController::class, 'show']); // {id} must be a number (\d+)
    //$r->get('/user/{id:\d+}[/{title}]', 'get_article_handler'); // The /{title} suffix is optional
});

$app = new App;
$app->run($dispatcher);