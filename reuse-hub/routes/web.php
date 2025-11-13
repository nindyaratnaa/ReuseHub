<?php

use App\Http\Controllers\PageController;

Route::get('/', [
    PageController::class,
    'beranda1'
]);
Route::get('/beranda', [
    PageController::class,
    'beranda'
]);
Route::get('/chat', [
    PageController::class,
    'chat'
]);
Route::get('/daftar', [
    PageController::class,
    'daftar'
]);
Route::get('/masuk', [
    PageController::class,
    'masuk'
]);
Route::get('/pesan', [
    PageController::class,
    'pesan'
]);
Route::get('/tentang', [
    PageController::class,
    'tentang'
]);
Route::get('/tukar', [
    PageController::class,
    'tukar'
]);
Route::get('/tukardetail', [
    PageController::class,
    'tukardetail'
]);
Route::get('/unggah', [
    PageController::class,
    'unggah'
]);
