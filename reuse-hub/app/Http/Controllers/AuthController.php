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

        $credentials = [
            'password' => $request->password
        ];

        // Check if input is email or username
        if (filter_var($request->emailUsername, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->emailUsername;
        } else {
            $credentials['name'] = $request->emailUsername;
        }

        if (Auth::attempt($credentials, $request->has('rememberMe'))) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'redirect' => '/beranda'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email/username atau password salah.'
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}