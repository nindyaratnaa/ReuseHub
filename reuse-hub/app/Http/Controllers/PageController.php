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

    public function profil()
    {
        $user = auth()->user();
        return view('profil', compact('user'));
    }
    public function rating()
    {
        return view('rating');
    }
    public function review()
    {
        return view('review');
    }
}
