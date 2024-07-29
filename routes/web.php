<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\landingpage\HomeController;
use App\Http\Controllers\Panel\AccountController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ScheduleController;
use App\Http\Controllers\Panel\CustomersController;
use App\Http\Controllers\Panel\FinanceController;
use App\Http\Controllers\Panel\LayananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

// Authenticated routes
Route::middleware('web')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Admin panel routes
    Route::prefix('/panel/admin')->group(function () {
        Route::resources([
            '/dashboard' => DashboardController::class,
            '/customers' => CustomersController::class,
            '/finance' => FinanceController::class,
            '/schedule' => ScheduleController::class,
            '/layanan' => LayananController::class,
            '/account' => AccountController::class,
        ]);

        Route::get('/get-layanan', [LayananController::class, 'getLayanan'])->name('layanan.getLayanan');
        Route::get('/get-layanan/{id}', [CustomersController::class, 'getLayananById'])->name('customer.getLayananById');
    });
});
