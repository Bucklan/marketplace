<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/products',ProductController::class);
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/cart',CartController::class);

Route::group(['middleware'=>'auth:sanctum'],function(){
   Route::post('/logout',[AuthController::class,'logout']);
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//Route::controller(AuthController::class)->group(function()
//{
//    Route::post('register', 'register');
//    Route::post('login', 'login');
//    Route::post('users', 'login')->name('index');
//
//});
//Route::middleware('auth:sanctum')->group(function() {
//    Route::get('/users',[RegisterController::class,'index'])->name('index');
//});
