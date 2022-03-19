<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

//ubah jadi group midlleware saja
//untuk login admin
Route::group(['middleware' => ['auth', 'level']], function () {
    Route::resource('product', \App\Http\Controllers\ProductController::class)->middleware('auth', 'level');
    Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

    //cart
    Route::resource('cart', \App\Http\Controllers\UserCartController::class)->middleware('auth', 'level');
    Route::resource('order', \App\Http\Controllers\OrderController::class)->middleware('auth', 'level');
});

Route::group(['middleware' => ['auth', 'levelmanager']], function () {
    //ini untuk manager
    Route::resource('product', \App\Http\Controllers\ProductController::class)->middleware('auth', 'levelmanager');
    Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth', 'levelmanager');

    Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('auth', 'levelmanager');
    Route::resource('user', UserController::class);
});

Route::group(['middleware' => ['auth', 'levelkasir']], function () {
    //ini untuk kasir
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//membuat route test
Route::get('/test', function () {
    return view('layouts.master');
});
