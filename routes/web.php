<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// BLOG GUEST ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');




#DELETE THESE ROUTES LATER
Route::get('/test', [HomeController::class, 'test'])->name('home.test');
Route::get('/design', function() {
    return view('design');
})->name('design');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//GUEST API ROUTES
Route::group(['prefix'=>'api','as'=>'guest.'], function(){

});

//LOGGED IN USER API ROUTES
Route::group(['middleware' => ['auth'], 'prefix'=>'api', 'as'=>'user.'], function(){
});

//LOGGED IN USER SPA ROUTES
Route::group(['middleware' => ['auth']], function() {
    Route::view('/dashboard', 'spa-dashboard')->where('any', '.*');
    Route::view('/dashboard/{any}', 'spa-dashboard')->where('any', '.*');
});

require __DIR__.'/auth.php';

//GUEST SPA ROUTES
Route::view('/{any}', 'spa')->where('any', '.*');
