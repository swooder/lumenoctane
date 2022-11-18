<?php

namespace Laravel\Octane\Events;

use Laravel\Lumen\Application;

trait HasApplicationAndSandbox
{
    /**
     * Get the base application instance.
     *
     * @return \Laravel\Lumen\Application
     */
    public function app(): Application
    {
        return $this->app;
    }

    /**
     * Get the sandbox version of the application instance.
     *
     * @return \Laravel\Lumen\Application
     */
    public function sandbox(): Application
    {
        return $this->sandbox;
    }
}
