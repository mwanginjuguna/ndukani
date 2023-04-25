<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/coming-soon', function () {
    return Inertia::render('ComingSoon');
})->name('coming-soon');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/product', function () {
        return Inertia::render('Products/ProductShow');
    })->name('product');

    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product-show');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addToCart');

    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('removeFromCart');

    Route::get('/cart', [CartController::class, 'getCart'])->name('getCart');

    Route::post('/cart', [CartController::class, 'getCart'])->name('getCart');

    Route::get('/checkout', function () {
        return Inertia::render('Checkout');
    })->name('checkout');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/product/new', function () {
        return Inertia::render('Products/ProductCreate', [
            "categories" => Category::all(),
            "tags" => Tag::all(),
            "brands" => Brand::all(),
        ]);
    })->name('product-create');

    // Route::resource('products', ProductController::class);


    Route::get('/products', function () {
        return Inertia::render('Products/ProductIndex');
    })->name('products');

    Route::get('/smartphones', function () {
        return Inertia::render('Products/ProductIndex');
    })->name('smartphones');

    Route::get('/categories', function () {
        return Inertia::render('Categories/CategoryIndex', ['categories' => Category::all()]);
    })->name('categories');

    Route::get('/tags', function () {
        return Inertia::render('Products/Tags', ['tags' => Tag::all()]);
    })->name('tags');

    Route::get('/brands', function () {
        return Inertia::render('Products/Brands', ['brands' => Brand::all(), 'categories' => Category::all()]);
    })->name('brands');

    Route::get('/samsung', function () {
        return Inertia::render('Products/Samsung');
    })->name('samsung-show');

});
