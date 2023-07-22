<?php

use App\Http\Controllers\Api\Common\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('categories')->group(function (){
    Route::get('',[CategoryController::class,'index']);

    Route::prefix('{category}')->group(function () {
        Route::get('products', [CategoryController::class, 'getProductsByCategory']);
    });
});
