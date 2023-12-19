<?php

namespace ChrisReedIO\WeatherGov\Data;

readonly class PointData extends WGData
{
    public function __construct(
        public readonly string $gridId,
        public readonly int $gridX,
        public readonly int $gridY,
        public readonly ?string $id = null,
        public readonly ?string $type = null,
        public readonly ?string $cwa = null,
        public readonly ?string $forecastOffice = null,
        public readonly ?string $forecast = null,
        public readonly ?string $forecastHourly = null,
        public readonly ?string $forecastGridData = null,
        public readonly ?string $observationStations = null,
        public readonly ?array $relativeLocation = null,
        public readonly ?string $forecastZone = null,
        public readonly ?string $county = null,
        public readonly ?string $fireWeatherZone = null,
        public readonly ?string $timeZone = null,
        public readonly ?string $radarStation = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            // Required fields
            gridId: $data['gridId'],
            gridX: $data['gridX'],
            gridY: $data['gridY'],
            // Optional fields
            id: $data['@id'],
            type: $data['@type'],
            cwa: $data['cwa'],
            forecastOffice: $data['forecastOffice'],
            forecast: $data['forecast'],
            forecastHourly: $data['forecastHourly'],
            forecastGridData: $data['forecastGridData'],
            observationStations: $data['observationStations'],
            relativeLocation: $data['relativeLocation'],
            forecastZone: $data['forecastZone'],
            county: $data['county'],
            fireWeatherZone: $data['fireWeatherZone'],
            timeZone: $data['timeZone'],
            radarStation: $data['radarStation']
        );
    }
}
