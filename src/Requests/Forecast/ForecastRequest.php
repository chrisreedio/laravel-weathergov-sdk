<?php

namespace ChrisReedIO\WeatherGov\Requests\Forecast;

use ChrisReedIO\WeatherGov\Data\ForecastData;
use Saloon\Http\Response;

class ForecastRequest extends BaseGridpointsRequest
{
    protected ?string $pathSuffix = 'forecast';

    public function createDtoFromResponse(Response $response): ForecastData
    {
        return ForecastData::fromArray(self::responseData($response));
    }


}
