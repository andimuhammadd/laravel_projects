<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminComponent;
use App\Http\Livewire\Customer\CustomerComponent;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('superadmin')->middleware('role:Super Admin')->group(function () {
    Route::get('/dashboard', SuperAdminComponent::class);
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', SuperAdminComponent::class)->name('superadmin.dashboard');
});

require __DIR__ . '/auth.php';
