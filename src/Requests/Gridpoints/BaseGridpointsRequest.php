<?php

namespace ChrisReedIO\WeatherGov\Requests\Gridpoints;

use ChrisReedIO\WeatherGov\Requests\BaseRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @property $pathSuffix
 */
abstract class BaseGridpointsRequest extends BaseRequest
{
    /**
     * The suffix to append to the path
     */
    protected ?string $pathSuffix = null;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        protected string $gridId,
        protected int $gridX,
        protected int $gridY,
    ) {
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        $path = "/gridpoints/{$this->gridId}/{$this->gridX},{$this->gridY}";
        if (! empty($this->pathSuffix)) {
            $path .= '/'.$this->pathSuffix;
        }

        return $path;
    }
}
