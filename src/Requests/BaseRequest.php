<?php

namespace ChrisReedIO\WeatherGov\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

abstract class BaseRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    protected function responseData(Response $response): array
    {
        return $response->json('properties');
    }
}
