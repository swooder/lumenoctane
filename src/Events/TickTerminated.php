<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;
use Laravel\Octane\Contracts\OperationTerminated;

class TickTerminated implements OperationTerminated
{
    use HasApplicationAndSandbox;

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
