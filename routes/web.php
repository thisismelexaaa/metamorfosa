<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\landingpage\HomeController;
use App\Http\Controllers\Panel\NewsController;
use App\Http\Controllers\Panel\AccountController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ScheduleController;
use App\Http\Controllers\Panel\CustomersController;
use App\Http\Controllers\Panel\FinanceController;
use App\Http\Controllers\Panel\KonsultasiController;
use App\Http\Controllers\Panel\LayananController;
use App\Http\Controllers\Panel\PartnersController;
use App\Http\Controllers\Panel\SettingAccountController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail-layanan', [HomeController::class, 'detailLayanan'])->name('detailLayanan');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

// error
Route::prefix('/error')->group(function () {
    Route::get('/403', function () {
        return view('errors.403');
    })->name('error.403');
    Route::get('/404', function () {
        return view('errors.404');
    })->name('error.404');
    Route::get('/500', function () {
        return view('errors.500');
    })->name('error.500');
});

// Authenticated routes
Route::middleware('web', 'ModifiedUrl')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Admin panel routes
    Route::prefix('/panel')->group(function () {
        Route::resources([
            '/dashboard' => DashboardController::class,
            '/customers' => CustomersController::class,
            '/konsultasi' => KonsultasiController::class,
            '/finance' => FinanceController::class,
            '/schedule' => ScheduleController::class,
            '/layanan' => LayananController::class,
            '/account' => AccountController::class,
            '/setting-account' => SettingAccountController::class,
            '/news' => NewsController::class,
            '/partners' => PartnersController::class
        ]);

        Route::get('/get-layanan', [LayananController::class, 'getLayanan'])->name('layanan.getLayanan');
        Route::get('/get-layanan/{id}', [CustomersController::class, 'getLayananById'])->name('customer.getLayananById');
        Route::get('get-sub-layanan', [KonsultasiController::class, 'getSubLayanan'])->name('getSubLayanan');

        // trashed customers
        Route::get('/trashed-customers', [CustomersController::class, 'trashed'])->name('customers.trash');
        Route::get('/restore-customers/{id}', [CustomersController::class, 'restore'])->name('customers.restore');

        // trashed konsultasi
        Route::get('/trashed-konsultasi', [KonsultasiController::class, 'trashed'])->name('konsultasi.trash');
        Route::get('/restore-konsultasi/{id}', [KonsultasiController::class, 'restore'])->name('konsultasi.restore');

        // trashed news
        Route::get('/trashed-news', [NewsController::class, 'trashed'])->name('news.trash');
        Route::get('/restore-news/{id}', [NewsController::class, 'restore'])->name('news.restore');

        // trashed partners
        Route::get('/trashed-partners', [PartnersController::class, 'trashed'])->name('partners.trash');
        Route::get('/restore-partners/{id}', [PartnersController::class, 'restore'])->name('partners.restore');
    });
});
