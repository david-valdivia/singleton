<?php

use App\Http\Controllers\SingletonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/singleton-demo', [SingletonController::class, 'index']);
