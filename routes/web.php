<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAdmin;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
//});

Route::get("/",[ProductController::class,'index'])->name('product.index');
Route::get("/product/{product:slug}",[ProductController::class,'show'])->name('product.show');
Route::get("search",[ProductController::class,'search'])->name('search');

Route::middleware(['auth'])->group(function(){
    Route::post("add_to_cart/{product}",[ProductController::class,'addToCart'])->name('product.add_to_cart');
    Route::get('/cart_list',[ProductController::class,'cartList'])->name('product.cart_list');
    Route::delete('/cartdelete/{cart}',[ProductController::class,'cartDelete'])->name('cartdelete');

    Route::get('/ordernow/{id}',[ProductController::class,'ordernow'])->name('product.ordernow');
    Route::post('orderplace',[ProductController::class,'orderPlace'])->name('product.orderplace');

    Route::post('/payment',[PaypalController::class,'pay'])->name('payment');
    Route::get('/success',[PaypalController::class,'success'])->name('success');
    Route::get('/error',[PaypalController::class,'error'])->name('error');
});


Route::middleware(['auth',CheckAdmin::class])->prefix('admin')->group( function ()
{
    Route::resource('/product',AdminController::class);
    Route::get('product/{product}',[AdminController::class,'show'])->name('admin.product.show');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
