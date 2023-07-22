<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\Account\LogoutController;


Route::prefix('logout')->as('logout')->group(function () {
    Route::post('', [LogoutController::class, 'logout'])->name('');

});
