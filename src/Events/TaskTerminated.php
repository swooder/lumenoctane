<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;
use Laravel\Octane\Contracts\OperationTerminated;

class TaskTerminated implements OperationTerminated
{
    use HasApplicationAndSandbox;

    public $app;
    public $sandbox;
    public $data;
    public $result;

    public function __construct(
         Application $app,
         Application $sandbox,
         $data,
         $result
    ) {
        $this->app = $app;
        $this->sandbox = $sandbox;
        $this->data = $data;
        $this->result = $result;
    }
}
