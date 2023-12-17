<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

class HourlyForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast/hourly';
}
