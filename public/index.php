<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Controllers\HomeController;
use App\Controllers\ArtistController;

/* DOTENV */
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/* CONSTANS */
define('VIEW_PATH', __DIR__ . '/../app/Views');

/* ROUTER */
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    
    $r->get('/artist', [ArtistController::class, 'index']);
    $r->get('/artist/{id:\d+}', [ArtistController::class, 'show']); // {id} must be a number (\d+)
    $r->get('/user/{id:\d+}[/{title}]', 'get_article_handler'); // The /{title} suffix is optional
});

/* PRZENIEŚĆ TO DO JAKIEJŚ ROUTEROWEJ KLASY */
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Rozpoznaj żądanie HTTP
$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

// echo '<pre>';
// var_dump($routeInfo);
// echo'</pre>';

if ($routeInfo[0] === FastRoute\Dispatcher::FOUND) {
    
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];

    $controller = new $handler[0];
    $action = $handler[1];

    echo $controller->$action($vars);

    // $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    // switch ($routeInfo[0]) {
    //     case FastRoute\Dispatcher::NOT_FOUND:
    //         // ... 404 Not Found
    //         break;
    //     case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    //         $allowedMethods = $routeInfo[1];
    //         // ... 405 Method Not Allowed
    //         break;
    //     case FastRoute\Dispatcher::FOUND:
    //         $handler = $routeInfo[1];
    //         $vars = $routeInfo[2];
    //         // ... call $handler with $vars
    //         break;
    // }
}