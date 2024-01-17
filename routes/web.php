<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
// // Admin Dashboard Route
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//     Route::controller(CategoryController::class)->group(function () {
//         Route::get('/admin/all-category', 'index')->name('admin.allCategory');
//         Route::post('/admin/add-category', 'store');
//     });

//     Route::controller(SubCategoryController::class)->group(function () {
//         Route::get('/admin/all-subCategory', 'index')->name('admin.allSubCategory');
//         Route::post('/admin/add-subCategory', 'store');
//     });

//     Route::controller(ProductController::class)->group(function () {
//         Route::get('/admin/all-product', 'index')->name('admin.allProduct');
//         Route::post('/admin/add-product', 'store');
//     });
    
//     Route::controller(OrderController::class)->group(function () {
//         Route::get('/admin/all-order', 'index')->name('admin.allOrder');
//         Route::post('/admin/add-order', 'store');
//     });
    
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
