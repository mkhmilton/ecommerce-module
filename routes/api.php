<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', [Api\AuthController::class, 'login']);    //Login
Route::get('/logout', [Api\AuthController::class, 'logout'])->middleware(['auth:sanctum']);    //logout
Route::post('/registration', [Api\AuthController::class, 'registration']);  //Registration

Route::get('/products', [Api\ProductController::class, 'index']);   // Show All Products
Route::post('/products', [Api\ProductController::class, 'store'])->middleware(['auth:sanctum', 'admin']); //Product add
Route::patch('/products/{product}', [Api\ProductController::class, 'update'])->middleware(['auth:sanctum', 'admin']); //Product update
Route::delete('/products/{product}', [Api\ProductController::class, 'destroy'])->middleware(['auth:sanctum', 'admin']); //Product delete

Route::get('/cart', [Api\ProductController::class, 'cart'])->middleware(['auth:sanctum']);  //All cart items
Route::post('/cart', [Api\ProductController::class, 'addToCart'])->middleware(['auth:sanctum']);    //Add to cart item

Route::post('/cart/order', [Api\ProductController::class, 'order'])->name('order')->middleware(['auth:sanctum']);    //Order or checkout
