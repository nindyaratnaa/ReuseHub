<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('daftar');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil!',
            'redirect' => '/beranda'
        ]);
    }

    public function showLogin()
    {
        return view('masuk');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailUsername' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Try login with email
        $credentials = [
            'email' => $request->emailUsername,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->has('rememberMe'))) {
            $request->session()->regenerate();
            
            $redirect = Auth::user()->is_admin ? '/admin/users' : '/beranda';
            
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'redirect' => $redirect
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah.'
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}