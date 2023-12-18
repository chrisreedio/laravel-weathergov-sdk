<?php

namespace ChrisReedIO\WeatherGov\Requests\Zones;

use ChrisReedIO\WeatherGov\Data\ZoneData;
use Saloon\Http\Response;

class ZoneCountyRequest extends BaseZoneRequest
{
    protected ?string $path = 'county';

}
