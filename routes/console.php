<?php

use App\Console\Commands\SendEmails;
use App\Console\Commands\SendWelcomingText;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(SendEmails::class)->everyTwoSeconds();
Schedule::command(SendWelcomingText::class)->everyTwoSeconds();