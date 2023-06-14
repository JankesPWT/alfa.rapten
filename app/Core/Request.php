<?php

declare(strict_types=1);

namespace App\Core;

class Request
{
    private array $routeParams = [];

    public function getUrl()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $position = strpos($path, '?'); //pozycja znaku zapytania 
        if ($position !== false) {
            $path = substr($path, 0, $position); 
        }
        return $path;
    }

    public function getMethod()
    {
        //return strtolower($_SERVER['REQUEST_METHOD']);
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isGet()
    {
        return $this->getMethod() === 'GET';
    }

    public function isPost()
    {
        return $this->getMethod() === 'POST';
    }

    public function getBody()
    {
        $body = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function setRouteParams($params)
    {
        $this->routeParams = $params;
        return $this;
    }
    
    public function getRouteParams()
    {
        return $this->routeParams;
    }

    public function getRouteParam($param, $default = null)
    {
        return $this->routeParams[$param] ?? $default;
    }

}