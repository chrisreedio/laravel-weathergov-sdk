<?php

namespace ChrisReedIO\WeatherGov\Requests;

use ChrisReedIO\WeatherGov\Data\OfficeData;
use Saloon\Http\Response;

class OfficeRequest extends BaseRequest
{
    public function __construct(
        protected string $officeId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/offices/'.$this->officeId;
    }

    public function createDtoFromResponse(Response $response): OfficeData
    {
        return OfficeData::fromArray($response->json());
    }
}
