<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// ============ AUTH ROUTES ============
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


//Profile

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/avatar', [App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('profile.avatar');


// ============ PROTECTED ROUTES ============
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('flowers', FlowerController::class);
    Route::get('/flowers-pdf', [FlowerController::class, 'generatePDF'])->name('flowers.pdf');
});