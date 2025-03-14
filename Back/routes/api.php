<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\CartItem\CartItemController;
use App\Http\Controllers\API\Question\QuestionController;
use App\Http\Controllers\API\Review\ReviewController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Wishlist\WishlistController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('/logout',[AuthController::class, 'logout']);

    Route::get('/verify-email/{email}', [AuthController::class, 'verifyEmail'])->name('verify.email');
    Route::post('/verify-email', [AuthController::class, 'sendNewVerificationMessage']);

    Route::post('/products/checkout', 'App\Http\Controllers\API\Product\CheckoutController');

    Route::get('/cart', [CartItemController::class, 'index']);
    Route::post('/cart', [CartItemController::class, 'store']);
    Route::put('/cart/{cartItem}', [CartItemController::class, 'update']);
    Route::delete('/cart/clear', [CartItemController::class, 'clearCart']);
    Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy']);

    Route::patch('/user/update/{user}', [UserController::class, 'updateGeneral']);
    Route::patch('/user/update/email/{user}', [UserController::class, 'updateEmail']);
    Route::patch('/user/update/password/{user}', [UserController::class, 'updatePassword']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/wishlist', [WishListController::class, 'index']);
    Route::post('/wishlist', [WishListController::class, 'store']);
    Route::delete('/wishlist/{wishlist}', [WishListController::class, 'destroy']);

    Route::post('/review', [ReviewController::class, 'store']);
    Route::patch('/review/mark-helpfulness/{review}', [ReviewController::class, 'markHelpfulness']);
    Route::patch('/review/report/{review}', [ReviewController::class, 'report']);
    Route::delete('/review/{review}', [ReviewController::class, 'destroy']);
});
    
Route::middleware('guest:sanctum')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/products/filters', 'App\Http\Controllers\API\Product\FilterListController');
Route::get('/products/{product}', 'App\Http\Controllers\API\Product\ShowController');
Route::post('/products', 'App\Http\Controllers\API\Product\IndexController');

Route::get('/categories', 'App\Http\Controllers\API\Category\CategoryController@index');
Route::get('/categories/{category}', 'App\Http\Controllers\API\Category\CategoryController@show');

Route::post('/user/subscribe', [UserController::class, 'subscribe']);
Route::delete('/user/subscribe/{user}', [UserController::class, 'unsubscribe']);

Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');