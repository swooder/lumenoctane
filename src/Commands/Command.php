<?php

namespace Laravel\Octane\Commands;

use Illuminate\Console\Command as BaseCommand;
use Laravel\Octane\Commands\Concerns\InteractsWithIO;
use Laravel\Octane\Stringable;

class Command extends BaseCommand
{
    use InteractsWithIO;
    /**
     * Get a new stringable object from the given string.
     *
     * @param  string  $string
     * @return Stringable
     */
    public static function of($string)
    {
        return new Stringable($string);
    }
}
