<?php

namespace Pterobilling\SocialAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;

class DiscordController extends Controller
{
  public function redirect()
  {
    return Socialite::driver('discord')->redirect();
  }

  public function callback()
  {
    $discord_user = Socialite::driver('discord')->user();

    $user = User::where('custom_id', $discord_user->getId())->first();

    if (!$user) {
      $user = User::create([
        'email' => $discord_user->getEmail(),
        'password' => Password::hash('password'),
        'language' => 'en',
        'custom_id' => $discord_user->getId(),
      ]);
      $user->save();

      Password::sendResetLink([
        'email' => $user->email,
      ]);

      return response()->json([]);
    } else {
      if (Auth::loginUsingId($user->id)) {
        return response()->json([
          'message' => 'Login successful',
          'user' => auth()->user()
        ], 200);
      } else {
        return response()->json(['message' => 'Invalid email or password'], 401);
      }
    }
  }
}
