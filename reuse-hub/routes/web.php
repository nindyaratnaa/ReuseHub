<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

// Public Routes
Route::get('/', [PageController::class, 'beranda1']);
Route::get('/tentang', [PageController::class, 'tentang']);
Route::get('/error', function () { return view('error'); });

// Auth Routes
Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
Route::post('/daftar', [AuthController::class, 'register']);
Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (require login)
Route::middleware('auth')->group(function () {
    Route::get('/beranda', [PageController::class, 'beranda']);
    Route::get('/tukar', [PageController::class, 'tukar']);
    Route::get('/tukardetail/{id}', [PageController::class, 'tukardetail']);
    Route::get('/unggah', [PageController::class, 'unggah']);
    Route::get('/profil', [PageController::class, 'profil']);
    Route::get('/chat', [PageController::class, 'chat']);
    Route::get('/pesan', [PageController::class, 'pesan']);
});

// Admin Routes
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users']);