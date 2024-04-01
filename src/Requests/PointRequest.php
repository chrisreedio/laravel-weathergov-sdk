<?php

namespace ChrisReedIO\WeatherGov\Requests;

use ChrisReedIO\WeatherGov\Data\PointData;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Http\Response;

class PointRequest extends BaseRequest implements Cacheable
{
    use HasCaching;

    public function __construct(
        protected float $latitude,
        protected float $longitude
    ) {
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/points/'.$this->latitude.','.$this->longitude;
    }

    public function createDtoFromResponse(Response $response): PointData
    {
        $data = $response->json('properties');

        return PointData::fromArray($data);
    }
}
