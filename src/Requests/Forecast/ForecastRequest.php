<?php

namespace ChrisReedIO\WeatherGov\Requests\Forecast;

class ForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast';
}
