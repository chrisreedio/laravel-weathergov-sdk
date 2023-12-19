<?php

namespace ChrisReedIO\WeatherGov\Data;

readonly class ZoneData extends WGData
{
    public function __construct(
        public readonly string $id,
        public readonly string $type,
        public readonly string $name,
        public readonly string $effectiveDate,
        public readonly string $expirationDate,
        public readonly string $state,
        public readonly array $cwa,
        public readonly array $forecastOffices,
        public readonly array $timeZone,
        public readonly array $observationStations,
        public readonly ?string $radarStation,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            type: $data['type'],
            name: $data['name'],
            effectiveDate: $data['effectiveDate'],
            expirationDate: $data['expirationDate'],
            state: $data['state'],
            cwa: $data['cwa'],
            forecastOffices: $data['forecastOffices'],
            timeZone: $data['timeZone'],
            observationStations: $data['observationStations'],
            radarStation: $data['radarStation'] ?? null,
        );
    }
}
