<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DashboardController;

// Public Routes
Route::get('/', [AuthController::class, 'landingView'])->name('landing.view');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');

// Authentication Actions
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Protected Routes (Only for Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboardView'])->name('dashboard.view');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});