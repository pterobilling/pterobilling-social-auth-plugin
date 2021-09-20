<?php

namespace Pterobilling\SocialAuth;

use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
  /**
   * The provider class names.
   *
   * @var array
   */
  protected $providers = [];

  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    // Registering public folders
    $this->publishes([
      __DIR__ . '/../public' => public_path('vendor/pterobilling/social-auth'),
    ], ['socialauth-assets', 'laravel-assets', 'plugin-assets']);

    // Registering commands
    if ($this->app->runningInConsole()) {
      $this->commands([
        Console\InstallCommand::class
      ]);
    };
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
  }
}
