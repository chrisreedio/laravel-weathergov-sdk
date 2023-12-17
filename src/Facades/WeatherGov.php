<?php

namespace ChrisReedIO\WeatherGov\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\WeatherGov\WeatherGov
 */
class WeatherGov extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\WeatherGov\WeatherGov::class;
    }
}
