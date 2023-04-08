<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/{product}/add-to-cart', [CartController::class, 'addToCart'])->name('products.addToCart');
    Route::post('/{product}/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('products.addToWishlist');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/sort', [ProductController::class, 'sort'])->name('products.sort');
});

// Example with names for the routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/product/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::patch('/product/reviews', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/product/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

// orders API
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'orders'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update');
});
