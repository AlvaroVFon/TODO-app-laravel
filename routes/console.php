<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
  $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('app:random-number', function () {
//   $randomNumber = rand(1, 1000);
//   $this->info("Random number: $randomNumber");
// })->purpose('Generate a random number between 1 and 1000.')->daily();
