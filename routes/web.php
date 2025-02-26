<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DashboardController;


Route::get('/', [AuthController::class, 'landingView'])->name('landing.view');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
Route::get('/dashboard', [DashboardController::class, 'dashboardView'])->name('dashboard.view');
