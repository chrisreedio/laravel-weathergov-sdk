<?php

namespace ChrisReedIO\WeatherGov\Resources;

use ChrisReedIO\WeatherGov\Data\ForecastData;
use ChrisReedIO\WeatherGov\Data\GridPointData;
use ChrisReedIO\WeatherGov\Data\OfficeData;
use ChrisReedIO\WeatherGov\Data\PointData;
use ChrisReedIO\WeatherGov\Requests\Gridpoints\ForecastRequest;
use ChrisReedIO\WeatherGov\Requests\Gridpoints\GridpointsRequest;
use ChrisReedIO\WeatherGov\Requests\Gridpoints\HourlyForecastRequest;
use ChrisReedIO\WeatherGov\Requests\Gridpoints\StationsRequest;
use ChrisReedIO\WeatherGov\Requests\OfficeRequest;
use ChrisReedIO\WeatherGov\Requests\PointRequest;
use ChrisReedIO\WeatherGov\WeatherGovConnector;

class PointResource extends BaseResource
{
    protected readonly WeatherGovConnector $connector;

    protected readonly float $latitude;

    protected readonly float $longitude;

    /**
     * The metadata for the point, returned from the API or our cache
     */
    protected PointData $point;

    public function __construct(WeatherGovConnector $connector, float $latitude, float $longitude)
    {
        parent::__construct($connector);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * This is the method that will be called by the user
     * It will return the metadata for the point
     * If the metadata has already been requested, it will return the cached data
     * If the metadata has not been requested, it will request it from the API
     */
    public function get(): PointResource
    {
        $this->metadata();

        return $this;
    }

    ////////////////////////////////////////////////////////////////////////////

    //region Point Metadata Method
    /**
     * Get the metadata for the point
     * This is usually the first request made to the API
     */
    protected function metadata(): PointData
    {
        $pointRequest = new PointRequest($this->latitude, $this->longitude);
        if (config('weathergov-sdk.cache.driver') === null) {
            $pointRequest->disableCaching();
        }
        $response = $this->connector->send($pointRequest);
        $this->point = $response->dtoOrFail();

        return $this->point;
    }

    protected function getPoint(): PointData
    {
        return $this->point ?? $this->metadata();
    }
    //endregion

    ////////////////////////////////////////////////////////////////////////////

    public function office(): OfficeData
    {
        $officeRequest = new OfficeRequest($this->getPoint()->gridId);

        return $this->connector->send($officeRequest)->dtoOrFail();
    }

    //region Gridpoints
    public function forecast(): ForecastData
    {
        $point = $this->getPoint();

        // Example: https://api.weather.gov/gridpoints/LWX/97,71/stations
        $forecastRequest = new ForecastRequest($point->gridId, $point->gridX, $point->gridY);

        return $this->connector->send($forecastRequest)->dtoOrFail();
    }

    public function hourly(): ForecastData
    {
        $point = $this->getPoint();

        $forecastRequest = new HourlyForecastRequest($point->gridId, $point->gridX, $point->gridY);

        return $this->connector->send($forecastRequest)->dtoOrFail();
    }

    public function gridpoints(): GridPointData
    {
        $point = $this->getPoint();

        $gridRequest = new GridpointsRequest($point->gridId, $point->gridX, $point->gridY);

        return $this->connector->send($gridRequest)->dtoOrFail();
    }

    /**
     * TODO: This will require cursor based pagination
     * Returns the first 500 stations for the point for now
     * Example: https://api.weather.gov/gridpoints/LWX/97,71/stations
     */
    public function stations(): mixed
    {
        $point = $this->getPoint();

        $stationRequest = new StationsRequest($point->gridId, $point->gridX, $point->gridY);

        // TODO: Replace this with a cursor based pagination method
        return $this->connector->send($stationRequest)->dtoOrFail();
    }
    //endregion Gridpoints
    //endregion
}
