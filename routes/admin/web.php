<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->as('admin.')->group(function () {

    Route::prefix('user')->middleware('auth:sanctum')->group(function () {
        Route::middleware('role:admin|manager')->group(function () {
            require('user/orders.php');
            require('user/clients.php');
            Route::middleware('role:admin')->group(function () {
                require('user/managers.php');
            });
        });
        require('user/logout.php');
        require('user/products.php');
        require('user/categories.php');
    });
});

Route::middleware('guest')->group(function () {
    require('guest/login.php');
});
