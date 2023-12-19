<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

/**
 * Example: https://api.weather.gov/gridpoints/LWX/97,71/forecast
 */
class ForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast';
}
