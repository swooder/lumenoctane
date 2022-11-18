<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;
use Throwable;

class WorkerErrorOccurred
{
    public $exception;
    public $sandbox;
    public function __construct( Throwable $exception,  Application $sandbox)
    {
        $this->exception = $exception;
        $this->sandbox = $sandbox;
    }
}
