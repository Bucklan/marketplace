<?php

use App\Http\Controllers\Api\User\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('orders')->group(function () {
    Route::get('', [OrderController::class, 'index']);
    Route::post('', [OrderController::class, 'store']);
    Route::prefix('{order}')->group(function () {
        Route::get('by-status', [OrderController::class, 'by_status']);
    });
});
