<?php

namespace Laravel\Octane;

use Illuminate\Contracts\Http\Kernel;
use Laravel\Lumen\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Laravel\Octane\Events\RequestHandled;
use Laravel\Octane\Events\RequestReceived;
use Laravel\Octane\Events\RequestTerminated;
use Laravel\Octane\Facades\Octane;
use Symfony\Component\HttpFoundation\Response;

class ApplicationGateway
{
    use DispatchesEvents;

    public function __construct( Application $app,  Application $sandbox)
    {
        $this->app = $app;
        $this->sandbox = $sandbox;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request): Response
    {
//        $this->dispatchEvent($this->sandbox, new RequestReceived($this->app, $this->sandbox, $request));

        if (Octane::hasRouteFor($request->getMethod(), '/'.$request->path())) {
            return Octane::invokeRoute($request, $request->getMethod(), '/'.$request->path());
        }
        return  $this->sandbox->dispatch($request);
//        return tap($this->sandbox->dispatch($request), function ($response) use ($request) {
//            $this->dispatchEvent($this->sandbox, new RequestHandled($this->sandbox, $request, $response));
//        });
//        return tap($this->sandbox->make(Kernel::class)->handle($request), function ($response) use ($request) {
//            $this->dispatchEvent($this->sandbox, new RequestHandled($this->sandbox, $request, $response));
//        });
    }

    /**
     * "Shut down" the application after a request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
    public function terminate(Request $request, Response $response): void
    {
//        $this->sandbox->terminate($request, $response);

//        $this->dispatchEvent($this->sandbox, new RequestTerminated($this->app, $this->sandbox, $request, $response));


    }
}
