<?php

use App\Http\Controllers\SlackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('slack.index');
});

Route::get('/slack', [SlackController::class, 'index'])
    ->name('slack.index');
Route::post('/slack/send', [SlackController::class, 'store'])
    ->name('slack.store');
