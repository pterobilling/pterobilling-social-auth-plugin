<?php

namespace Pterobilling\SocialAuth;

use Illuminate\Support\AggregateServiceProvider;

class SocialAuthServiceProvider extends AggregateServiceProvider
{
  /**
   * The provider class names.
   *
   * @var array
   */
  protected $providers = [
    MainServiceProvider::class,
    EventServiceProvider::class,
    RouteServiceProvider::class,
  ];

  public function script_link()
  {
    return '/vendor/pterobilling/social-auth/social-auth.js';
  }

  public function stylesheet_link()
  {
    return '/vendor/pterobilling/social-auth/social-auth.css';
  }

  public function loading_class()
  {
    return 'SocialAuthPlugin';
  }
}
