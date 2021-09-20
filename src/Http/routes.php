<?php

namespace Pterobilling\SocialAuth\Http;

use Illuminate\Support\Facades\Route;
use Pterobilling\SocialAuth\Http\Controllers\DiscordController;
use Pterobilling\SocialAuth\Http\Controllers\GithubController;

Route::get('/discord/redirect', [DiscordController::class, 'redirect']);
Route::get('/discord/callback', [DiscordController::class, 'callback']);

Route::get('/github/redirect', [GithubController::class, 'redirect']);
Route::get('/github/callback', [GithubController::class, 'callback']);
