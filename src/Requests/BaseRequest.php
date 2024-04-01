<?php

namespace ChrisReedIO\WeatherGov\Requests;

use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function config;

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

    //region Caching
    public function resolveCacheDriver(): Driver
    {
        $driverName = config('weathergov-sdk.cache.driver');

        return new LaravelCacheDriver(Cache::store($driverName));
    }

    // Default expiry
    public function cacheExpiryInSeconds(): int
    {
        return 60 * 60 * 24 * 7; // One Week
    }
    //endregion Caching
}
