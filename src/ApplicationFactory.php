<?php

namespace Laravel\Octane;

use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use Laravel\Lumen\Application;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Foundation\Bootstrap\SetRequestForConsole;
use ReflectionObject;
use RuntimeException;

class ApplicationFactory
{
    public function __construct( string $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Create a new application instance.
     *
     * @param  array  $initialInstances
     * @return \Laravel\Lumen\Application
     */
    public function createApplication(array $initialInstances = []): Application
    {
        $path = $this->basePath.'/bootstrap/app.php';

        if (! file_exists($path)) {
            throw new RuntimeException("Application bootstrap file not found [{$path}].");
        }

        return $this->warm($this->bootstrap(require $path, $initialInstances));
    }

    /**
     * Bootstrap the given application.
     *
     * @param  \Laravel\Lumen\Application  $app
     * @param  array  $initialInstances
     * @return \Laravel\Lumen\Application
     */
    public function bootstrap(Application $app, array $initialInstances = []): Application
    {
        foreach ($initialInstances as $key => $value) {
            $app->instance($key, $value);
        }

//        $app->bootstrapWith($this->getBootstrappers($app));

//        $app->loadDeferredProviders();

        return $app;
    }

    /**
     * Get the application's HTTP kernel bootstrappers.
     *
     * @param  \Laravel\Lumen\Application  $app
     * @return array
     */
    protected function getBootstrappers(Application $app): array
    {
        $method = (new ReflectionObject(
            $kernel = $app->make(HttpKernelContract::class)
        ))->getMethod('bootstrappers');

        $method->setAccessible(true);

        return $this->injectBootstrapperBefore(
            RegisterProviders::class,
            SetRequestForConsole::class,
            $method->invoke($kernel)
        );
    }

    /**
     * Inject a given bootstrapper before another bootstrapper.
     *
     * @param  string  $before
     * @param  string  $inject
     * @param  array  $bootstrappers
     * @return array
     */
    protected function injectBootstrapperBefore(string $before, string $inject, array $bootstrappers): array
    {
        $injectIndex = array_search($before, $bootstrappers, true);

        if ($injectIndex !== false) {
            array_splice($bootstrappers, $injectIndex, 0, [$inject]);
        }

        return $bootstrappers;
    }

    /**
     * Warm the application with pre-resolved, cached services that persist across requests.
     *
     * @param  \Laravel\Lumen\Application  $app
     * @param  array  $services
     * @return \Laravel\Lumen\Application
     */
    public function warm(Application $app, array $services = []): Application
    {
        foreach ($services ?: $app->make('config')->get('octane.warm', []) as $service) {
            if (is_string($service) && $app->bound($service)) {
                $app->make($service);
            }
        }

        return $app;
    }
}
