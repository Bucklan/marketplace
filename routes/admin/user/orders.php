<?php

use App\Http\Controllers\Admin\User\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->as('orders.')->group(function (){
    Route::get('',[OrderController::class,'index'])->name('index');
    Route::prefix('{order}')->group(function () {
        Route::put('confirm', [OrderController::class, 'confirmed'])->name('confirmed');
        Route::put('cancel', [OrderController::class, 'canceled'])->name('canceled');
    });
});
