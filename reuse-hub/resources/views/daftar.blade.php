@extends('layouts.mainB')

@section('title', 'Daftar - ReuseHub')

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
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                </svg>
            </div>
            
            <div class="max-w-md text-center relative z-10">
                <div class="mb-6">
                    <h1 class="text-4xl font-bold text-white mb-6">Reuse Hub</h1>
                </div>
                <h2 class="text-3xl font-semibold text-white mb-4">
                    Jadilah Pahlawan Lingkungan
                </h2>
                <p class="text-green-100 text-lg leading-relaxed">
                    Ubah barang yang tidak terpakai menjadi manfaat, bukan sampah. Dengan ikut serta dalam ekonomi sirkular dan membantu menyelamatkan bumi.
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

        <!-- Kanan: Signup form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-4 md:p-8 fade-in-right">
            <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">

                <div class="text-center mb-8 md:hidden">
                    <h1 class="text-3xl font-bold text-green-600 mb-2">Reuse Hub</h1>
                    <h2 class="text-2xl font-semibold text-gray-800">Buat akunmu</h2>
                    <p class="text-gray-500 mt-2">Jadilah Pahlawan Lingkungan</p>
                </div>

                <form id="signupForm" class="space-y-6" method="POST" action="/daftar">
                    @csrf
                    <div class="space-y-4">
                      <!-- Email -->
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama lengkap</label>
                                <div class="relative">
                                    <input id="nama_lengkap" type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                                </div>
                                <p id="namaError" class="text-red-500 text-sm mt-1 hidden">Masukkan nama lengkap yang benar</p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat email</label>
                                <div class="relative">
                                    <input id="email" type="email" name="email" placeholder="Masukkan alamat email"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                                </div>
                                <p id="emailError" class="text-red-500 text-sm mt-1 hidden">Masukkan alamat email yang valid</p>
                        </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata sandi</label>
                                <div class="relative">
                                    <input id="password" type="password" name="password" placeholder="Buat kata sandi"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                                </div>
                                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">Kata sandi harus antara 6 dan 20 karakter</p>
                            </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi kata sandi</label>
                            <div class="relative">
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi"
                                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                            </div>
                            <p id="confirmError" class="text-red-500 text-sm mt-1 hidden">Kata sandi tidak cocok</p>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-all">
                        Buat akun
                    </button>

                    <p class="mt-2 text-center text-sm text-gray-600">
                        Sudah memiliki akun?
                        <a href="/masuk" class="text-green-600 hover:text-green-700 font-medium">
                            Masuk
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- JS validation -->
    <script>
        const form = document.getElementById("signupForm");
        const namaError = document.getElementById("namaError");
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        const confirmError = document.getElementById("confirmError");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Reset errors
            document.querySelectorAll('[id$="Error"]').forEach(el => el.classList.add('hidden'));
            
            // Show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mendaftar...';

            try {
                const response = await fetch('/daftar', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    alert('Registrasi berhasil! Anda akan diarahkan ke beranda.');
                    window.location.href = data.redirect;
                } else {
                    // Show validation errors
                    if (data.errors) {
                        if (data.errors.nama_lengkap) namaError.classList.remove('hidden');
                        if (data.errors.email) emailError.classList.remove('hidden');
                        if (data.errors.password) passwordError.classList.remove('hidden');
                    }
                }
            } catch (error) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Buat akun';
            }
        });
    </script>
@endsection