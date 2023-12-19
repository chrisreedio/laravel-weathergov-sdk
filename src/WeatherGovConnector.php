<?php

namespace ChrisReedIO\WeatherGov;

use ChrisReedIO\WeatherGov\Resources\ForecastResource;
use ChrisReedIO\WeatherGov\Resources\PointResource;
use ChrisReedIO\WeatherGov\Resources\ZoneResource;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class WeatherGovConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.weather.gov';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }

    //region Resources
    public function point(float $latitude, float $longitude): PointResource
    {
        return new PointResource($this, $latitude, $longitude);
    }

    public function forecast(): ForecastResource
    {
        return new ForecastResource($this);
    }

    public function zone(): ZoneResource
    {
        return new ZoneResource($this);
    }
    //endregion
}
