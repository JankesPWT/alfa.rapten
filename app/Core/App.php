<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Config;
use App\Core\DB;
use App\Core\Request;
use App\Exceptions\RouteNotFoundException;
use FastRoute;

class App
{
    private Request $request;
    protected Config $config;
    // private static DB $db;

    public function __construct()
    {
        $this->request = new Request();
        // static::$db = new DB($config->db ?? []);
    }

    // public static function db(): DB
    // {
    //     return static::$db;
    // }

    public function run($dispatcher)
    {
        $method = $this->request->getMethod();
        $uri = $this->request->getUrl();

        $router = $dispatcher->dispatch($method, $uri);

        if ($router[0] === FastRoute\Dispatcher::FOUND) {
            $handler = $router[1];
            $params = $router[2];

            $controller = new $handler[0];
            $action = $handler[1];
            echo $controller->$action($params);

        } else if ($router[0] === FastRoute\Dispatcher::NOT_FOUND) {
            //header('HTTP/1.1 404 Not Found');
            http_response_code(404);
            
            echo View::make('errors/404');
        }
    }
}