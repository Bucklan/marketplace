<?php

use App\Http\Controllers\Admin\User\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('clients')->as('clients.')->group(function () {
    Route::get('', [ClientController::class, 'index'])->name('index');

    Route::prefix('{client}')->group(function (){
        Route::put('block',[ClientController::class,'block'])->name('block');
        Route::put('unblock',[ClientController::class,'unblock'])->name('unblock');
    });
});
