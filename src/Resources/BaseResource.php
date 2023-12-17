<?php

namespace ChrisReedIO\WeatherGov\Resources;

use ChrisReedIO\WeatherGov\WeatherGovConnector;

abstract class BaseResource
{
    protected readonly WeatherGovConnector $connector;

    public function __construct(WeatherGovConnector $connector) {
        $this->connector = $connector;
    }
}
