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


// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/api/search', [HomeController::class, 'search'])->name('search');
// Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('/api/products/{slug}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/api/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/parent-categories', [CategoryController::class, 'parents'])->name('categories.parents');
// Route::get('parent-categories', [CategoryController::class, 'parents'])->name('categories.parents');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('d', [CategoryController::class, 'downloadCategoriesFromIbay'])->name('categories.downloadCategoriesFromIbay');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}/products', [CategoryProductController::class, 'index'])->name('categories.products.index');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/api/categories/for-select', [CategoryController::class, 'forSelect'])->name('categories.for-select');
    Route::get('/api/categories/{id}/levels', [CategoryController::class, 'levels'])->name('categories.levels');
    Route::get('/api/categories/{id}/children', [CategoryController::class, 'children'])->name('categories.children');
    Route::get('/api/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/api/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/api/listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
    // Route::get('listings/{productSlug}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::get('/api/listings/{productSlug}/form-data', [ListingController::class, 'productFormData'])->name('listings.product-form-data');
    Route::patch('/api/listings/{productSlug}', [ListingController::class, 'update'])->name('listings.update');
    Route::post('/api/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('listings/{productSlug}', [ListingController::class, 'show'])->name('listings.show');
    Route::get('/locations/for-select', [LocationController::class, 'forSelect'])->name('locations.for-select');
    
    Route::view('/dashboard', 'spa-dashboard')->where('any', '.*');
    Route::view('/dashboard/{any}', 'spa-dashboard')->where('any', '.*');
});

require __DIR__.'/auth.php';
Route::view('/{any}', 'spa')->where('any', '.*');
