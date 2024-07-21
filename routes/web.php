<?php

use App\Http\Controllers\landingpage\HomeController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\JadwalController;
use App\Http\Controllers\Panel\PelangganController;
use App\Http\Controllers\Panel\KeuanganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resource('/', HomeController::class);

// prefix routes for admin
Route::prefix('panel/admin')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/keuangan', KeuanganController::class);
    Route::resource('/jadwal', JadwalController::class);
});
