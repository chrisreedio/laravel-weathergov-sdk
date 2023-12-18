<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

use Saloon\Http\Response;

/**
 * Example: https://api.weather.gov/gridpoints/LWX/97,71/stations
 */
class StationsRequest extends BaseGridpointsRequest
{
    protected ?string $pathSuffix = 'stations';

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json('observationStations');
    }
}
