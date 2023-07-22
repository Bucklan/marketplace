<?php

use App\Http\Controllers\Admin\User\Manager\ManagerController;
use Illuminate\Support\Facades\Route;

Route::prefix('managers')->as('managers.')->group(function () {
    Route::get('',[ManagerController::class,'index'])->name('index');
    Route::get('create',[ManagerController::class,'create'])->name('create');
    Route::post('',[ManagerController::class,'store'])->name('store');
    Route::prefix('{manager}')->group(function (){
        Route::get('edit',[ManagerController::class,'edit'])->name('edit');
        Route::put('update',[ManagerController::class,'update'])->name('update');
        Route::delete('destroy',[ManagerController::class,'destroy'])->name('destroy');
        Route::put('block', [ManagerController::class, 'block'])->name('block');
        Route::put('unblock', [ManagerController::class, 'unblock'])->name('unblock');
    });
});
