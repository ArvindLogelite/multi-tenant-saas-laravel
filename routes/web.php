<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantAuthController;
use App\Http\Controllers\TenantDashboardController;
use App\Http\Controllers\TenantTaskController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tenants', TenantController::class);
});
Route::patch('/tenants/{tenant}/toggle-status', [TenantController::class, 'toggleStatus'])
    ->name('tenants.toggleStatus');

Route::get('/tenant/login', [TenantAuthController::class, 'showLoginForm'])
    ->name('tenant.login');

Route::post('/tenant/login', [TenantAuthController::class, 'login'])
    ->name('tenant.login.submit');

Route::middleware('tenant.auth')->group(function () {

    Route::get('/tenant/dashboard', [TenantDashboardController::class, 'index'])
        ->name('tenant.dashboard');
    Route::middleware('tenant.auth')->group(function () {

        Route::get('/tenant/dashboard', [TenantDashboardController::class, 'index'])
            ->name('tenant.dashboard');
        Route::post('/tenant/logout', [TenantAuthController::class, 'logout'])
            ->name('tenant.logout');

        Route::resource('tasks', TenantTaskController::class);
    });
});

require __DIR__ . '/auth.php';
