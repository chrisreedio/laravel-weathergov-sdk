<?php

namespace ChrisReedIO\WeatherGov\Resources;

use ChrisReedIO\WeatherGov\Data\PointData;
use ChrisReedIO\WeatherGov\Requests\Gridpoints\ForecastRequest;
use Saloon\Http\Response;

class ForecastResource extends BaseResource
{
    public function office(): void
    {

    }

    public function get(PointData $point): Response
    {
        $forecastRequest = new ForecastRequest($point->gridId, $point->gridX, $point->gridY);

        return $this->connector->send($forecastRequest); //->dtoOrFail();
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
}
