<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/B', function () {
    return view('welcome');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/beranda', function () {
    return view('beranda');
});


Route::get('/beranda1', function () {
    return view('beranda1');
});