<?php

namespace Pterobilling\SocialAuth\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'plugin:social-auth:install';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Install all of the Social Auth plugin resources';

  /**
   * Execute the console command.
   *
   * @return void
   */
  public function handle()
  {
    $this->comment('Publishing Social Auth plugin Assets...');
    $this->callSilent('vendor:publish', ['--tag' => 'socialauth-assets', '--all']);


    $this->info('Plugin installed successfully.');
  }
}
