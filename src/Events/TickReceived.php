<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;

class TickReceived
{
    public $app;
    public $sandbox;
    public function __construct(
         Application $app,
         Application $sandbox
    ) {
        $this->app = $app;
        $this->sandbox = $sandbox;
    }
}
