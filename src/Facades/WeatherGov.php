<?php

namespace ChrisReedIO\WeatherGov\Facades;

use ChrisReedIO\WeatherGov\WeatherGovConnector;
use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\WeatherGov\WeatherGov
 */
class WeatherGov extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WeatherGovConnector::class;
    }
}
