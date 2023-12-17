<?php

namespace ChrisReedIO\WeatherGov\Requests\Forecast;

use ChrisReedIO\WeatherGov\Data\ForecastData;
use ChrisReedIO\WeatherGov\Requests\Forecast\BaseGridpointsRequest;
use Saloon\Http\Response;

abstract class BaseForecastRequest extends BaseGridpointsRequest
{
    public function createDtoFromResponse(Response $response): ForecastData
    {
        return ForecastData::fromArray(self::responseData($response));
    }
}
