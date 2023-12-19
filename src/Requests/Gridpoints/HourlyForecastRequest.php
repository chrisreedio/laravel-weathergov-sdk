<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

/**
 * Example: https://api.weather.gov/gridpoints/LWX/97,71/forecast/hourly
 */
class HourlyForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast/hourly';
}
