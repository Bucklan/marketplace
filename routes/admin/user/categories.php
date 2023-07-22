<?php

use App\Http\Controllers\Admin\User\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
