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
    private static DB $db;
    protected $router;

    public function __construct($router, $env)
    {
        $this->config = new Config($env);
        $this->router = $router;
        $this->request = new Request();
        static::$db = new DB($this->config->db ?? []);
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        $method = $this->request->getMethod();
        $uri = $this->request->getUrl();

        $router = $this->router->dispatch($method, $uri);

        if ($router[0] === FastRoute\Dispatcher::FOUND) {
            $handler = $router[1];
            $params = $router[2];

            $controller = new $handler[0];
            $action = $handler[1];
            echo $controller->$action($params);

        } else if ($router[0] === FastRoute\Dispatcher::NOT_FOUND) {
            http_response_code(404);
            
            echo View::make('errors/404');
        }
    }
}