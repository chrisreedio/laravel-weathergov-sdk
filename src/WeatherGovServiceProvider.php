<?php

namespace ChrisReedIO\WeatherGov;

use ChrisReedIO\WeatherGov\Commands\WeatherGovCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WeatherGovServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-weathergov-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-weathergov-sdk_table')
            ->hasCommand(WeatherGovCommand::class);
    }
}
