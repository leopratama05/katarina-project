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

});

Route::group(['middleware'=>['auth','manager']], function(){
    //ini untuk manager
});

Route::group(['middleware'=>['auth','kasir']], function(){
    //ini untuk kasir
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//membuat route test
Route::get('/test', function () {
    return view('layouts.master');
});
