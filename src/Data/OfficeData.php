<?php

namespace ChrisReedIO\WeatherGov\Data;

readonly class OfficeData extends WGData
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly array $address,
        public readonly string $telephone,
        public readonly string $faxNumber,
        public readonly string $email,
        public readonly string $sameAs,
        public readonly string $nwsRegion,
        public readonly string $parentOrganization,
        public readonly array $responsibleCounties,
        public readonly array $responsibleForecastZones,
        public readonly array $responsibleFireZones,
        public readonly array $approvedObservationStations
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            address: $data['address'],
            telephone: $data['telephone'],
            faxNumber: $data['faxNumber'],
            email: $data['email'],
            sameAs: $data['sameAs'],
            nwsRegion: $data['nwsRegion'],
            parentOrganization: $data['parentOrganization'],
            responsibleCounties: $data['responsibleCounties'],
            responsibleForecastZones: $data['responsibleForecastZones'],
            responsibleFireZones: $data['responsibleFireZones'],
            approvedObservationStations: $data['approvedObservationStations']
        );
    }
}
