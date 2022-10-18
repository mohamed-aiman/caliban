<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryProductController;

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
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('d', [CategoryController::class, 'downloadCategoriesFromIbay'])->name('categories.downloadCategoriesFromIbay');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

// Route::group(['middleware' => ['auth'], function() {
    Route::get('/categories/{slug}/products', [CategoryProductController::class, 'index'])->name('categories.products.index');
    Route::get('/categories/for-select', [CategoryController::class, 'forSelect'])->name('categories.for-select');
    Route::get('/categories/{id}/levels', [CategoryController::class, 'levels'])->name('categories.levels');
    Route::get('parent-categories', [CategoryController::class, 'parents'])->name('categories.parents');
    Route::get('categories/{id}/children', [CategoryController::class, 'children'])->name('categories.children');
    Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('/locations/for-select', [LocationController::class, 'forSelect'])->name('locations.for-select');
// });
