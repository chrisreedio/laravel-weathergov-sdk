<?php

namespace ChrisReedIO\WeatherGov\Resources;

use ChrisReedIO\WeatherGov\Data\ZoneData;
use ChrisReedIO\WeatherGov\Requests\Zones\ZoneCountyRequest;
use ChrisReedIO\WeatherGov\Requests\Zones\ZoneFireRequest;
use ChrisReedIO\WeatherGov\Requests\Zones\ZoneForecastRequest;

class ZoneResource extends BaseResource
{
    public function forecast(string $zoneId): ZoneData
    {
        $zoneForecastRequest = new ZoneForecastRequest($zoneId);

        return $this->connector->send($zoneForecastRequest)->dtoOrFail();
    }

    public function fire(string $zoneId): ZoneData
    {
        $fireRequest = new ZoneFireRequest($zoneId);

        return $this->connector->send($fireRequest)->dtoOrFail();
    }

    public function county(string $countyId): ZoneData
    {
        $countyRequest = new ZoneCountyRequest($countyId);

        return $this->connector->send($countyRequest)->dtoOrFail();
    }
}
