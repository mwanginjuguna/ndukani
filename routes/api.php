<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
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
