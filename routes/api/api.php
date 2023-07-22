<?php

use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {

    include('common/products.php');
    include('common/categories.php');

    Route::middleware('guest')->group(function () {
        include('guest/auth.php');
    });

    Route::prefix('user')->middleware('auth:sanctum')->group(function () {

        include('user/carts.php');
        include('user/orders.php');

    });
});
