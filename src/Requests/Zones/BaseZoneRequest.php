<?php

namespace ChrisReedIO\WeatherGov\Requests\Zones;

use ChrisReedIO\WeatherGov\Data\ZoneData;
use ChrisReedIO\WeatherGov\Requests\BaseRequest;
use Exception;
use Saloon\Http\Response;

class BaseZoneRequest extends BaseRequest
{
    protected ?string $path;

    public function __construct(
        protected string $zoneId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        if (! isset($this->path)) {
            throw new Exception('No path set for request');
        }

        return "/zones/{$this->path}/{$this->zoneId}";
    }

    public function createDtoFromResponse(Response $response): ZoneData
    {
        return ZoneData::fromArray($response->json('properties'));
    }
}
