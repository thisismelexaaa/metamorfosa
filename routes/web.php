<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\landingpage\HomeController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ScheduleController;
use App\Http\Controllers\Panel\CustomersController;
use App\Http\Controllers\Panel\FinanceController;
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
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Admin panel routes
    Route::prefix('/panel/admin')->group(function () {
        Route::resources([
            '/dashboard' => DashboardController::class,
            '/customers' => CustomersController::class,
            '/finance' => FinanceController::class,
            '/schedule' => ScheduleController::class,
        ]);
    });
});
