<?php

namespace Laravel\Octane\Swoole\Handlers;

use Laravel\Octane\Swoole\SwooleExtension;

class OnManagerStart
{
    public function __construct(
         SwooleExtension $extension,
         string $appName,
         bool $shouldSetProcessName = true
    ) {
        $this->extension = $extension;
        $this->appName = $appName;
        $this->shouldSetProcessName = $shouldSetProcessName;
    }

    /**
     * Handle the "managerstart" Swoole event.
     *
     * @return void
     */
    public function __invoke()
    {
        if ($this->shouldSetProcessName) {
            $this->extension->setProcessName($this->appName, 'manager process');
        }
    }
}
