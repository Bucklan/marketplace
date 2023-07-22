<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\Product\ProductController;


    Route::resource('products', ProductController::class);
