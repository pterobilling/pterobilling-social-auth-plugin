<?php

namespace Pterobilling\SocialAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
  public function redirect()
  {
    return Socialite::driver('github')->redirect();
  }

  public function callback()
  {
    $user = Socialite::driver('github')->user();
  }
}
