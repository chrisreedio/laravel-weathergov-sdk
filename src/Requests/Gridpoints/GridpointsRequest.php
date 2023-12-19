<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

use ChrisReedIO\WeatherGov\Data\GridPointData;
use Saloon\Http\Response;

/**
 * Example: https://api.weather.gov/gridpoints/LWX/97,71
 */
class GridpointsRequest extends BaseGridpointsRequest
{
    public function createDtoFromResponse(Response $response): GridPointData
    {
        return GridPointData::fromArray(self::responseData($response));
    }
}
