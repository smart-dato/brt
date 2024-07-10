<?php

namespace SmartDato\Brt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmartDato\Brt\Brt
 */
class Brt extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SmartDato\Brt\Brt::class;
    }
}
