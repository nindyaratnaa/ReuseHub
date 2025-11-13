<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
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

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/tukar', function () {
    return view('tukar');
});

Route::get('/tukardetail/{id}', function ($id) {
    return view('tukardetail');
});

Route::get('/unggah', function () {
    return view('unggah');
});

Route::get('/error', function () {
    return view('error');
});