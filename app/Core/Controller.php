<?php

declare(strict_types=1);

namespace App\Core;

class Controller 
{
    public Response $response;
    public Request $request;
    public Session $session; 
    public function __construct(Request $request, Response $response, Session $session)
    {
        $this->request = $request;
        $this->response = $response;
        $this->session = $session;
    }
}