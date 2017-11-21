<?php

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

Route::get('/','\App\Http\Controllers\ProductController@products')->name('products');
Route::prefix('admin')->group(function () {
    Route::get('/', '\App\Http\Controllers\ProductController@index')->middleware('can:view,App\Product')->name('admin.products');
    Route::get('products', '\App\Http\Controllers\ProductController@index')->middleware('can:view,App\Product')->name('admin.product.index');
    Route::get('products/show/{id}', '\App\Http\Controllers\ProductController@show')->middleware('can:view,App\Product')->name('admin.product.show');
    Route::get('products/create', '\App\Http\Controllers\ProductController@create')->middleware('can:create,App\Product')->name('admin.product.create');
    Route::post('products/store', '\App\Http\Controllers\ProductController@store')->middleware('can:create,App\Product')->name('admin.product.store');
    Route::post('products/update/{id}', '\App\Http\Controllers\ProductController@update')->middleware('can:update,App\Product')->name('admin.product.update');
    Route::get('products/delete/{id}', '\App\Http\Controllers\ProductController@delete')->middleware('can:delete,App\Product')->name('admin.product.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
