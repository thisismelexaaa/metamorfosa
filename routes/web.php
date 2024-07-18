<?php

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ScheduleController;
use App\Http\Controllers\Panel\CustomersController;
use App\Http\Controllers\Panel\FinanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// prefix routes for admin
Route::prefix('panel/admin')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/customers', CustomersController::class);
    Route::resource('/finance', FinanceController::class);
    Route::resource('/schedule', ScheduleController::class);
});
