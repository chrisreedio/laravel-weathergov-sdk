<?php

namespace ChrisReedIO\WeatherGov\Data;

readonly class WGPoint extends WGData
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
        );
    }
}
