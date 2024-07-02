<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RandomNumber extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'randomNumber';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Generate a random number between 1 and 1000.';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $randomNumber = rand(1, 1000);
    $this->info("Random number: $randomNumber");
  }
}
