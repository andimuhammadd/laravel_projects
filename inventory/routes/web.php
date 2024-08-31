<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
});

Route::middleware('auth', 'admin')->group(function () {
    route::get('admin/dashboard', [HomeController::class, 'index']);
    route::get('admin/products', [ProductController::class, 'index'])->name('admin.product');
    route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.products.create');
});

require __DIR__ . '/auth.php';

// route::get('admin/dashboard', [HomeController::class, 'index']);
//route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
