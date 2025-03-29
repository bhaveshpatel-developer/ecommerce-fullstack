<?php

use App\Http\Controllers\ShopController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [ShopController::class, 'index'])->name('shop.index'); // Homepage with product listing
Route::get('/category/{category}', [ShopController::class, 'category'])->name('shop.category'); // Filter by category
Route::get('/product/{product}', [ShopController::class, 'show'])->name('shop.product'); // Product details
Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart'); // Shopping cart
Route::post('/order', [ShopController::class, 'order'])->name('shop.order'); // Place an order
