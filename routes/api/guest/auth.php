<?php

use App\Http\Controllers\Api\Guest\Auth as Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::prefix('register')->group(function () {
        Route::post('', [Auth\RegisterController::class, 'register']);
    });
    Route::prefix('login')->group(function () {
        Route::post('', [Auth\LoginController::class, 'login']);
    });
});
