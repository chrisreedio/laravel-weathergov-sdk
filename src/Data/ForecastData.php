<?php

namespace ChrisReedIO\WeatherGov\Data;

use ChrisReedIO\WeatherGov\Data\WGData;

readonly class ForecastData extends WGData
{
    public function __construct(
        public readonly string $updated,
        public readonly string $units,
        public readonly string $forecastGenerator,
        public readonly string $generatedAt,
        public readonly string $updateTime,
        public readonly string $validTimes,
        public readonly array $elevation,
        //TODO: Extract out the periods array to a PeriodData class
        public readonly array $periods,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            updated: $data['updated'],
            units: $data['units'],
            forecastGenerator: $data['forecastGenerator'],
            generatedAt: $data['generatedAt'],
            updateTime: $data['updateTime'],
            validTimes: $data['validTimes'],
            elevation: $data['elevation'],
            periods: $data['periods'],
        );
    }
}
