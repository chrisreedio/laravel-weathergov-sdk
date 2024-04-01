<?php

namespace ChrisReedIO\WeatherGov\Data;

readonly class MeasurementData extends WGData
{
    public function __construct(
        public string $validTime,
        public ?float $measurement,
    ) {

    }

    public static function fromArray(array $data): self
    {
        return new self(
            validTime: $data['validTime'],
            measurement: $data['value'],
        );
    }
}
