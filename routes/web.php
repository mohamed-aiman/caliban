<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;

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
    Route::get('categories/{id}/children', [CategoryController::class, 'children'])->name('categories.children');
    Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('listings', [ListingController::class, 'store'])->name('listings.store');
// });
