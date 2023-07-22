<?php

use App\Http\Controllers\Api as Api;
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

Route::prefix('products')->group(function (){
    Route::get('',[Api\ProductController::class,'index']);


        //o  зарегистрироваться и авторизоваться    Login Register
        //o  просмотреть список категории  ListCategories
        //o  просмотреть список товаров по категориям GetProductsByCategory
        //o  просмотреть список заказов со статусом GetOrdersByStatus
        //o  добавить товар в корзину и оформить заказ AddProductsToCart || Order
});
