<?php

namespace Pterobilling\SocialAuth;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * The controller namespace for the application.
   *
   * When present, controller route declarations will automatically be prefixed with this namespace.
   *
   * @var string|null
   */
  protected $namespace = 'Pterobilling\\SocialAuth\\Controllers';

  /**
   * Define your route model bindings, pattern filters, etc.
   *
   * @return void
   */
  public function boot()
  {
    Route::prefix('api/social-auth')
      ->middleware('api')
      ->namespace($this->namespace)
      ->group(function () {
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
      });
  }
}
