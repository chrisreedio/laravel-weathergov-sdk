<?php

namespace ChrisReedIO\WeatherGov\Requests\Zones;

use ChrisReedIO\WeatherGov\Data\ZoneData;
use Saloon\Http\Response;

class ZoneForecastRequest extends BaseZoneRequest
{
    protected ?string $path = 'forecast';

    public function createDtoFromResponse(Response $response): ZoneData
    {
        return ZoneData::fromArray($response->json('properties'));
    }
}
