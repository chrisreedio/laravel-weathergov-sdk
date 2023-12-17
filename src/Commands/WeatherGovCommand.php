<?php

namespace ChrisReedIO\WeatherGov\Commands;

use Illuminate\Console\Command;

class WeatherGovCommand extends Command
{
    public $signature = 'laravel-weathergov-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
