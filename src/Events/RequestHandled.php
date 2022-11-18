<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestHandled
{
    public $sandbox;
    public $request;
    public $response;
    public function __construct(
         Application $sandbox,
         Request $request,
         Response $response
    ) {
        $this->sandbox = $sandbox;
        $this->request =$request;
        $this->response = $response;
    }
}
