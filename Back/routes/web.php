<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\Main\IndexController')->name('main.index');

Route::group(['prefix' => 'categories', 'namespace' => 'App\Http\Controllers\Category'], function() {
    Route::get('/', 'IndexController')->name('category.index');
    Route::get('/create', 'CreateController')->name('category.create');
    Route::post('/', 'StoreController')->name('category.store');
    Route::get('/{category}/edit', 'EditController')->name('category.edit');
    Route::get('/{category}', 'ShowController')->name('category.show');
    Route::patch('/{category}', 'UpdateController')->name('category.update');
    Route::delete('/{category}', 'DeleteController')->name('category.delete');
});

Route::group(['prefix' => 'tags', 'namespace' => 'App\Http\Controllers\Tag'], function() {
    Route::get('/', 'IndexController')->name('tag.index');
    Route::get('/create', 'CreateController')->name('tag.create');
    Route::post('/', 'StoreController')->name('tag.store');
    Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
    Route::get('/{tag}', 'ShowController')->name('tag.show');
    Route::patch('/{tag}', 'UpdateController')->name('tag.update');
    Route::delete('/{tag}', 'DeleteController')->name('tag.delete');
});

Route::group(['prefix' => 'sizes', 'namespace' => 'App\Http\Controllers\size'], function() {
    Route::get('/', 'IndexController')->name('size.index');
    Route::get('/create', 'CreateController')->name('size.create');
    Route::post('/', 'StoreController')->name('size.store');
    Route::get('/{size}/edit', 'EditController')->name('size.edit');
    Route::get('/{size}', 'ShowController')->name('size.show');
    Route::patch('/{size}', 'UpdateController')->name('size.update');
    Route::delete('/{size}', 'DeleteController')->name('size.delete');
});

Route::group(['prefix' => 'coupons', 'namespace' => 'App\Http\Controllers\coupon'], function() {
    Route::get('/', 'IndexController')->name('coupon.index');
    Route::get('/create', 'CreateController')->name('coupon.create');
    Route::post('/', 'StoreController')->name('coupon.store');
    Route::get('/{coupon}/edit', 'EditController')->name('coupon.edit');
    Route::get('/{coupon}', 'ShowController')->name('coupon.show');
    Route::patch('/{coupon}', 'UpdateController')->name('coupon.update');
    Route::delete('/{coupon}', 'DeleteController')->name('coupon.delete');
});

Route::group(['prefix' => 'colors', 'namespace' => 'App\Http\Controllers\Color'], function() {
    Route::get('/', 'IndexController')->name('color.index');
    Route::get('/create', 'CreateController')->name('color.create');
    Route::post('/', 'StoreController')->name('color.store');
    Route::get('/{color}/edit', 'EditController')->name('color.edit');
    Route::get('/{color}', 'ShowController')->name('color.show');
    Route::patch('/{color}', 'UpdateController')->name('color.update');
    Route::delete('/{color}', 'DeleteController')->name('color.delete');
});

Route::group(['prefix' => 'users', 'namespace' => 'App\Http\Controllers\User'], function() {
    Route::get('/', 'IndexController')->name('user.index');
    Route::get('/create', 'CreateController')->name('user.create');
    Route::post('/', 'StoreController')->name('user.store');
    Route::get('/{user}/edit', 'EditController')->name('user.edit');
    Route::get('/{user}', 'ShowController')->name('user.show');
    Route::patch('/{user}', 'UpdateController')->name('user.update');
    Route::delete('/{user}', 'DeleteController')->name('user.delete');
});

Route::group(['prefix' => 'products', 'namespace' => 'App\Http\Controllers\Product'], function() {
    Route::get('/', 'IndexController')->name('product.index');
    Route::get('/create', 'CreateController')->name('product.create');
    Route::post('/', 'StoreController')->name('product.store');
    Route::get('/{product}/edit', 'EditController')->name('product.edit');
    Route::get('/{product}', 'ShowController')->name('product.show');
    Route::patch('/{product}', 'UpdateController')->name('product.update');
    Route::delete('/{product}', 'DeleteController')->name('product.delete');
});