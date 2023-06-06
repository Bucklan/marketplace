<?php
//
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class)->only('index', 'show');
Route::get('products/category/{category}', [ProductController::class, 'productByCategory'])->name('products.category');

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:admin|moderator']], function () {
        Route::prefix('admin')->as('admin.')->group(function () {
            Route::resource('products', AdminProductController::class);
            Route::resource('categories', AdminCategoryController::class);
            Route::delete('comments', [AdminProductController::class, 'destroyComment'])->name('comments.destroy');
            Route::get('/cart', [UserController::class, 'cart'])->name('cart.index');
            Route::get('/cart/{cart}/confirm', [UserController::class, 'confirm'])->name('cart.confirm');
            Route::get('/cart/{cart}/decline', [UserController::class, 'decline'])->name('cart.decline');
            Route::group(['middleware' => ['role:admin']], function () {
                Route::resource('users', UserController::class);
            });
        });
    });
    Route::resource('comments', CommentController::class);
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}/putToCart', [CartController::class, 'putToCart'])->name('cart.putToCart');
    Route::post('/cart/destroyAll', [CartController::class, 'destroyAll'])->name('cart.destroyAll');
    Route::post('/cart/{product}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/{product}/destroyInIndex', [CartController::class, 'destroyInIndex'])->name('cart.destroyInIndex');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::resource('/roles', RoleController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

