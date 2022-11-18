<?php

namespace Laravel\Octane;

use Symfony\Component\HttpFoundation\Response;

class OctaneResponse
{
    public function __construct( Response $response,  ?string $outputBuffer = null)
    {
        $this->response = $response;
        $this->outputBuffer = $outputBuffer;

    }
}
