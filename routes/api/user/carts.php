<?php

use App\Http\Controllers\Api\User as Cart;
use Illuminate\Support\Facades\Route;

Route::prefix('carts')->group(function () {
    Route::get('', [Cart\CartController::class, 'index']);

    Route::prefix('products')->group(function () {
        Route::prefix('{product}')->group(function () {
            Route::post('', [Cart\CartController::class, 'store']);
        });
    });
});
