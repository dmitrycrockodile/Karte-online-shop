<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\CartItem\CartItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/products', 'App\Http\Controllers\API\Product\IndexController');
Route::get('/products/filters', 'App\Http\Controllers\API\Product\FilterListController');
Route::get('/products/{product}', 'App\Http\Controllers\API\Product\ShowController');

Route::get('/categories', 'App\Http\Controllers\API\Category\CategoryController@getCategories');
Route::post('/categories/{category}/products', 'App\Http\Controllers\API\Category\CategoryController@getCategoryProducts');
Route::get('/categories/{category}', 'App\Http\Controllers\API\Category\CategoryController@getCategory');

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout',[AuthController::class, 'logout']);
});
    
Route::middleware('guest:sanctum')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartItemController::class, 'index']);
    Route::post('/cart', [CartItemController::class, 'store']);
    Route::put('/cart/{cartItem}', [CartItemController::class, 'update']);
    Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy']);
});