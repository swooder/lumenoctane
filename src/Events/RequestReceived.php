<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;
use Illuminate\Http\Request;

class RequestReceived
{
    public $app;
    public $sandbox;
    public $request;
    public function __construct(
         Application $app,
         Application $sandbox,
         Request $request
    ) {
        $this->app = $app;
        $this->sandbox = $sandbox;
        $this->request = $request;
    }
}
