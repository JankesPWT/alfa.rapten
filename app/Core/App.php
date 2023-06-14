<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Config;
use App\Core\Request;
use App\Core\Response;
use App\Exceptions\RouteNotFoundException;
use Dotenv\Dotenv;
use FastRoute;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

class App
{
    private Request $request;
    private Response $response;
    protected Session $session;
    protected Config $config;
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
    }

    public function initDb(array $config)
    {
        $capsule = new Capsule();

        $capsule->addConnection($config);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__ . '/../../..'));
        $dotenv->load();

        $this->config = new Config($_ENV);

        $this->initDb($this->config->db);

        //static::$db = new DB($this->config->db ?? []);

        // $this->container->set(PaymentGatewayServiceInterface::class, PaymentGatewayService::class);
        // $this->container->set(MailerInterface::class, fn() => new CustomMailer($this->config->mailer['dsn']));

        return $this;
    }

    public function run()
    {
        $this->session->start();
        $method = $this->request->getMethod();
        $uri = $this->request->getUrl();

        $router = $this->router->dispatch($method, $uri);

        if ($router[0] === FastRoute\Dispatcher::FOUND) {
            $handler = $router[1];
            $params = $router[2];

            $controller = new $handler[0]($this->request, $this->response, $this->session);
            $action = $handler[1];
            echo $controller->$action($params);

        } else if ($router[0] === FastRoute\Dispatcher::NOT_FOUND) {
            $this->response->statusCode(404);
           
            View::make('errors/404');
        }
    }
}