<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
Route::get('login',[LoginController::class,'login_form'])->name('login.form');
Route::post('login',[LoginController::class,'login'])->name('login');
