<?php

use App\Http\Controllers\CategoryController;
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
    })->name('product-show');

    Route::get('/products', function () {
        return Inertia::render('Products/ProductIndex');
    })->name('products');

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
