<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});
// Admin Dashboard Route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'index')->name('admin.all-category');
        Route::post('/admin/add-category', 'store');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subCategory', 'index')->name('admin.all-subCategory');
        Route::post('/admin/add-subCategory', 'store');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'index')->name('admin.all-product');
        Route::post('/admin/add-product', 'store');
    });
    
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/all-order', 'index')->name('admin.all-order');
        Route::post('/admin/add-order', 'store');
    });
    
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
