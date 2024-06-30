<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/images', 'App\Http\Controllers\ImageController@index')->name('images.index');
// Route::post('/images', 'App\Http\Controllers\ImageController@store')->name('images.store');
Route::resource('images', ImageController::class);
