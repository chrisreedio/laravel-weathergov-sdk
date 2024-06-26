<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

use ChrisReedIO\WeatherGov\Data\ForecastData;
use Saloon\Http\Response;

abstract class BaseForecastRequest extends BaseGridpointsRequest
{
    public function createDtoFromResponse(Response $response): ForecastData
    {
        return ForecastData::fromArray(self::responseData($response));
    }
}
