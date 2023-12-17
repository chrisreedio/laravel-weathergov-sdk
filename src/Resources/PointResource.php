<?php

namespace ChrisReedIO\WeatherGov\Resources;

use ChrisReedIO\WeatherGov\Data\ForecastData;
use ChrisReedIO\WeatherGov\Data\OfficeData;
use ChrisReedIO\WeatherGov\Data\PointData;
use ChrisReedIO\WeatherGov\Requests\Forecast\ForecastRequest;
use ChrisReedIO\WeatherGov\Requests\Forecast\OfficeRequest;
use ChrisReedIO\WeatherGov\Requests\PointRequest;
use ChrisReedIO\WeatherGov\WeatherGovConnector;
use Saloon\Http\Response;

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
        $this->point = $this->connector->send($pointRequest)->dtoOrFail();

        return $this->point;
    }
    //endregion

    ////////////////////////////////////////////////////////////////////////////

    //region Forecast Methods
    public function office(): OfficeData
    {
        $point = (! isset($this->point)) ? $this->metadata() : $this->point;

        $officeRequest = new OfficeRequest($point->gridId);

        return $this->connector->send($officeRequest)->dtoOrFail();
    }

    public function forecast(): ForecastData
    {
        $point = (! isset($this->point)) ? $this->metadata() : $this->point;

        $forecastRequest = new ForecastRequest($point->gridId, $point->gridX, $point->gridY);

        return $this->connector->send($forecastRequest)->dtoOrFail();
    }

    public function hourly(): void
    {

    }

    public function grid(): void
    {

    }

    public function stations(): void
    {

    }

    public function zone(): void
    {

    }

    public function county(): void
    {

    }

    public function fire(): void
    {

    }
    //endregion
}
