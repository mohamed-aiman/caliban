<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
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

#DELETE THESE ROUTES LATER
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}/products', [CategoryProductController::class, 'index'])->name('categories.products.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('redirect-to-sell', [ListingController::class, 'create'])->name('listings.create');
//GUEST API ROUTES
Route::group(['prefix'=>'api','as'=>'guest.'], function(){
    Route::get('search', [ProductController::class, 'search'])->name('search');
    Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('parent-categories', [CategoryController::class, 'parents'])->name('categories.parents');

});

//LOGGED IN USER API ROUTES
Route::group(['middleware' => ['auth'], 'prefix'=>'api', 'as'=>'user.'], function(){
    Route::get('categories/for-select', [CategoryController::class, 'forSelect'])->name('categories.for-select');
    Route::get('categories/{id}/levels', [CategoryController::class, 'levels'])->name('categories.levels');
    Route::get('categories/{id}/children', [CategoryController::class, 'children'])->name('categories.children');
    Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('listings/{productSlug}/form-data', [ListingController::class, 'productFormData'])->name('listings.product-form-data');
    Route::patch('listings/is-active-toggle', [ListingController::class, 'isActiveToggle'])->name('listings.is-active-toggle');
    Route::patch('listings/{productSlug}', [ListingController::class, 'update'])->name('listings.update');
    Route::post('listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('listings/{productSlug}', [ListingController::class, 'show'])->name('listings.show');
    Route::get('locations/for-select', [LocationController::class, 'forSelect'])->name('locations.for-select');
    Route::get('watchlist', [LikeController::class, 'index'])->name('likes.index');
    Route::post('likes/toggle', [LikeController::class, 'toggle'])->name('likes.toggle');

});

//LOGGED IN USER SPA ROUTES
Route::group(['middleware' => ['auth']], function() {
    Route::view('/dashboard', 'spa-dashboard')->where('any', '.*');
    Route::view('/dashboard/{any}', 'spa-dashboard')->where('any', '.*');
});

require __DIR__.'/auth.php';

//GUEST SPA ROUTES
Route::view('/{any}', 'spa')->where('any', '.*');
