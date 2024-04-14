<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//schedule a command to run every minute
Artisan::command('schedule:run', function () {
    $this->comment('Running scheduled commands...');
    $this->call('request:reset-counts');
    $this->call('storage:clear'); //* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
})->purpose('Run the scheduled commands')->hourly();
