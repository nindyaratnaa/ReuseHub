@extends('layouts.mainB')

@section('title', 'Masuk - ReuseHub')

@section('content')  
    <div class="w-full md:flex min-h-[calc(100vh-4rem)]">
        <!-- Kiri: Text content -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-green-400 via-green-500 to-green-600 items-center justify-center p-8 fade-in-left relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full"></div>
                <div class="absolute top-32 right-16 w-16 h-16 bg-white rounded-full"></div>
                <div class="absolute bottom-20 left-20 w-12 h-12 bg-white rounded-full"></div>
                <div class="absolute bottom-40 right-10 w-8 h-8 bg-white rounded-full"></div>
                <div class="absolute top-1/2 left-1/4 w-6 h-6 bg-white rounded-full"></div>
                <div class="absolute top-1/3 right-1/3 w-4 h-4 bg-white rounded-full"></div>
            </div>
            
            <!-- Decorative Icons -->
            <div class="absolute top-16 right-12 text-white opacity-20">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                </svg>
            </div>
            
            <div class="absolute bottom-16 left-12 text-white opacity-20">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <div class="max-w-md text-center relative z-10">
                <div class="mb-6">
                    <h1 class="text-4xl font-bold text-white mb-6">Selamat Datang Kembali!</h1>
                </div>
                <h2 class="text-3xl font-semibold text-white mb-4">
                    Lanjutkan Perjalanan Guna Ulang Anda
                </h2>
                <p class="text-green-100 text-lg leading-relaxed">
                    Masuk ke akun ReuseHub Anda dan temukan barang-barang menarik untuk ditukar. Bersama kita wujudkan bumi yang lebih hijau.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 mt-8 text-center">
                    <div class="bg-white bg-opacity-10 rounded-lg p-3">
                        <div class="text-2xl font-bold text-green-500">10k+</div>
                        <div class="text-green-500 text-sm">Pengguna</div>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-lg p-3">
                        <div class="text-2xl font-bold text-green-500">25k+</div>
                        <div class="text-green-500 text-sm">Barang Ditukar</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kanan: Login form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-4 md:p-8 fade-in-right">
            <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

                <div class="text-center mb-8 md:hidden">
                    <h1 class="text-3xl font-bold text-green-600 mb-2">ReuseHub</h1>
                    <h2 class="text-2xl font-semibold text-gray-800">Masuk ke akun</h2>
                    <p class="text-gray-500 mt-2">Selamat datang kembali!</p>
                </div>

                <form id="loginForm" class="space-y-6" method="POST" action="/masuk">
                    @csrf
                    <div class="space-y-4">
                        <!-- Email/Username -->
                        <div>
                            <label for="emailUsername" class="block text-sm font-medium text-gray-700 mb-1">Email atau Username</label>
                            <div class="relative">
                                <input id="emailUsername" type="text" name="emailUsername" placeholder="Masukkan email atau username"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                            </div>
                            <p id="emailUsernameError" class="text-red-500 text-sm mt-1 hidden">Email atau username tidak boleh kosong</p>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata sandi</label>
                            <div class="relative">
                                <input id="password" type="password" name="password" placeholder="Masukkan kata sandi"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                            </div>
                            <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">Kata sandi tidak boleh kosong</p>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="rememberMe" type="checkbox" name="rememberMe" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                            </div>
                            <a href="#" class="text-sm text-green-600 hover:text-green-700 font-medium">
                                Lupa kata sandi?
                            </a>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-all">
                        Masuk
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Atau lanjutkan dengan</span>
                        </div>
                    </div>

                    <!-- Social Buttons -->
                    <div class="grid grid-cols-1 gap-4">
                        <button type="button" class="border border-gray-300 rounded-lg py-2 font-medium hover:bg-gray-50 transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Lanjutkan dengan Google
                        </button>
                    </div>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        Belum memiliki akun?
                        <a href="/daftar" class="text-green-600 hover:text-green-700 font-medium">
                            Daftar sekarang
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- JS validation -->
    <script>
        const form = document.getElementById("loginForm");
        const emailUsernameError = document.getElementById("emailUsernameError");
        const passwordError = document.getElementById("passwordError");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Reset errors
            emailUsernameError.classList.add("hidden");
            passwordError.classList.add("hidden");
            
            // Show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Masuk...';

            try {
                const response = await fetch('/masuk', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    alert('Login berhasil! Anda akan diarahkan ke beranda.');
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Email/username atau password salah.');
                }
            } catch (error) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Masuk';
            }
        });
    </script>
@endsection