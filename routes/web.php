<?php

use App\Http\Middleware\Level;
use App\Http\Middleware\LevelManager;
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
    return view('welcome');
});

Route::resource('register', \App\Http\Controllers\Auth\RegisterController::class);

Auth::routes();
Route::group(['middleware' => ['auth','levelmanager']], function () {
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::get('product/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

    
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('invoice',\App\Http\Controllers\InvoiceController::class);
    Route::resource('laporan',\App\Http\Controllers\LaporanController::class);
    Route::post('/laporan/search', 'App\Http\Controllers\LaporanController@search')->name('laporan.search');
});

Route::group(['middleware' =>['auth','levelkasir']], function () {

    //cart
    Route::resource('cart', \App\Http\Controllers\UserCartController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);

    Route::resource('do_transaction', \App\Http\Controllers\DoTransactionController::class);
    Route::resource('invoice',\App\Http\Controllers\InvoiceController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//membuat route test
Route::get('/dashboard', function () {
    return view('welcome');
});
