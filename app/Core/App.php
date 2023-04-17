<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Config;
use App\Core\DB;
use App\Core\Request;
use App\Exceptions\RouteNotFoundException;
use Dotenv\Dotenv;
use FastRoute;

class App
{
    private Request $request;
    private Response $response;
    protected Config $config;
    public static DB $db;
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->request = new Request();
        $this->response = new Response();
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function boot(): static
    {
        echo __DIR__;
        $dotenv = Dotenv::createImmutable(dirname(__DIR__ . '/../../..'));
        $dotenv->load();

        $this->config = new Config($_ENV);

        static::$db = new DB($this->config->db ?? []);

        // $this->container->set(PaymentGatewayServiceInterface::class, PaymentGatewayService::class);
        // $this->container->set(MailerInterface::class, fn() => new CustomMailer($this->config->mailer['dsn']));

        return $this;
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
            $this->response->statusCode(404);
           
            View::make('errors/404');
        }
    }
}