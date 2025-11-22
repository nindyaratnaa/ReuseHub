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
    Route::get('/profil', [PageController::class, 'profil']);
    Route::post('/profil/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/chat', [PageController::class, 'chat']);
    Route::get('/pesan', [PageController::class, 'pesan']);
    Route::get('/rating', [PageController::class, 'rating']);
    Route::post('/rating/submit', [App\Http\Controllers\ReviewController::class, 'store'])->name('rating.submit');
    Route::get('/review', [PageController::class, 'review']);
    Route::get('/review/{userId}', [App\Http\Controllers\ReviewController::class, 'show'])->name('review.show');

    
    // Item routes
    Route::get('/tukar', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
    Route::get('/tukardetail/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
    Route::get('/unggah', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
    Route::post('/unggah', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/items', [App\Http\Controllers\AdminController::class, 'items'])->name('admin.items');
    Route::delete('/items/{id}', [App\Http\Controllers\AdminController::class, 'deleteItem'])->name('admin.items.delete');
});