<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDash'])->name('admin-dashboard')->middleware('role:admin');
    Route::put('/user/asignRole/{user}', [DashboardController::class, 'assignRole'])->name('assgin-role')->middleware('role:admin');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index')->middleware('role:admin|editor');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store')->middleware('role:admin|editor');
    Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('role:admin');
    Route::get('/product/gallery', [ProductController::class, 'productGallery'])->name('product-gallery');
});

require __DIR__.'/auth.php';
