<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

class ForecastRequest extends BaseForecastRequest
{
    protected ?string $pathSuffix = 'forecast';
}
