<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }
    public function beranda1()
    {
        return view('beranda1');
    }
    public function chat()
    {
        return view('chat');
    }
    public function daftar()
    {
        return view('daftar');
    }
    public function masuk()
    {
        return view('masuk');
    }
    public function pesan()
    {
        return view('pesan');
    }
    public function tentang()
    {
        return view('tentang');
    }
    public function tukar()
    {
        return view('tukar');
    }
    public function tukardetail()
    {
        return view('tukardetail');
    }
    public function unggah()
    {
        return view('unggah');
    }
    public function profil()
    {
        return view('profil');
    }
    public function rating()
    {
        return view('rating');
    }
}
