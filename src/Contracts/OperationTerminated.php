<?php

namespace Laravel\Octane\Contracts;

use Laravel\Lumen\Application;;

interface OperationTerminated
{
    /**
     * Get the base application instance.
     *
     * @return \Laravel\Lumen\Application;
     */
    public function app(): Application;

    /**
     * Get the sandbox version of the application instance.
     *
     * @return \Laravel\Lumen\Application
     */
    public function sandbox(): Application;
}
