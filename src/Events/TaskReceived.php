<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;

class TaskReceived
{
    public $app;
    public $sandbox;
    public $data;
    public function __construct(
         Application $app,
         Application $sandbox,
         $data
    ) {
        $this->app = $app;
        $this->sandbox = $sandbox;
        $this->data = $data;
    }
}
