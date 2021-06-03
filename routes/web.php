<?php


use App\Http\Controllers\Admin;
use App\Http\Controllers\FrontendController;
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
//Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/cart', [FrontendController::class, 'cart'])->middleware('auth')->name('cart');
Route::post('/cart', [FrontendController::class, 'addToCart'])->name('addToCart'); //Ajax request
Route::delete('/cart/{product}', [FrontendController::class, 'removeFromCart'])->name('removeFromCart'); //Ajax request
Route::post('/cart/order', [FrontendController::class, 'order'])->name('order')->middleware('auth');

//Admin Routes
Route::group(['middleware' => ['admin', 'auth'], 'prefix' => 'backend/', 'as' => 'admin.'], function(){
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', Admin\ProductController::class);
    Route::resource('orders', Admin\OrderController::class);
});

Route::get('/dashboard', function(){
    if (auth()->user()->admin)
        return redirect()->route('admin.dashboard');
    return redirect()->route('index');
});

require __DIR__.'/auth.php';


