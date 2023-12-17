<?php

namespace ChrisReedIO\WeatherGov\Requests\Forecast;

class HourlyForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast/hourly';
}
