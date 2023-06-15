<?php

declare(strict_types=1);

namespace App\Core;

use Formr\Formr;

class Controller 
{
    protected Response $response;
    protected Request $request;
    protected Session $session;
    protected Formr $form;
    public function __construct(Request $request, Response $response, Session $session)
    {
        $this->request = $request;
        $this->response = $response;
        $this->session = $session;
    }
}