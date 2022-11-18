<?php

namespace Laravel\Octane;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Laravel\Lumen\Application;

class CurrentApplication
{
    /**
     * Set the current application in the container.
     *
     * @param  \Laravel\Lumen\Application  $app
     * @return void
     */
    public static function set(Application $app): void
    {
        $app->instance('app', $app);
        $app->instance(Container::class, $app);

        Container::setInstance($app);

        Facade::clearResolvedInstances();
        Facade::setFacadeApplication($app);
    }
}
