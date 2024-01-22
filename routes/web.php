<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEnd\{ProductController,CartController};

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

Route::get('/', [HomeController::class, 'showHomePage'])->name('home');

// Product Controller
Route::get('/product/{slug}', [ProductController::class, 'showProductDetails'])->name('product.details');

// Cart Controller
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'showCart')->name('cart.show');
    Route::post('/cart', 'addToCart')->name('cart.add');
    Route::post('/cart/remove', 'removeFromCart')->name('cart.remove');
    Route::get('/cart/clear', 'clearCart')->name('cart.clear');
    Route::get('/checkout', 'checkout')->middleware(['auth', 'verified'])->name('checkout');
    Route::post('/process/order', 'processOrder')->middleware('auth')->name('process.order');
    Route::get('/my-orders', 'myOrders')->middleware(['auth', 'verified'])->name('my.orders');
    Route::get('/order-details/{order_id}', 'orderDetails')->middleware(['auth', 'verified'])->name('order.details');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
