<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class test extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'create {type?} {name?}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Greetings from Laravel artisan!';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $type = ($this->argument('type')) ? $this->argument('type') : $this->choice('What\'s do you want to create', ['model', 'policy', 'controller', 'command']);
    $name = ($this->argument('name')) ? $this->argument('name') : $this->ask('What\'s the name of the ' . $type . '?');
    Artisan::call('make:' . $type, ['name' => $name]);
    $this->info($type . ' ' . $name . ' created successfully.');
  }
}
