@extends('layouts.mainB')

@section('title', 'Daftar')

@section('content')  
    <div class="w-full md:flex min-h-[calc(100vh-4rem)]">
        <!-- Kiri: Text content -->
        <div class="hidden md:flex md:w-1/2 bg-green-50 items-center justify-center p-8 fade-in-left">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-green-600 mb-6">Reuse Hub</h1>
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">
                    Jadilah Pahlawan Lingkungan
                </h2>
                <p class="text-gray-600 text-lg">
                    Ubah barang yang tidak terpakai menjadi manfaat, bukan sampah. Dengan ikut serta dalam ekonomi sirkular dan membantu menyelamatkan bumi.
                </p>
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

                <form id="signupForm" class="space-y-6">
                    <div class="space-y-4">
                      <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Nama lengkap</label>
                                <div class="relative">
                                    <input id="email" type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none transition-all duration-200" required>
                                </div>
                                <p id="emailError" class="text-red-500 text-sm mt-1 hidden">Masukkan nama lengkap yang benar</p>
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
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi kata sandi</label>
                            <div class="relative">
                                <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Konfirmasi kata sandi"
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
                        <button type="button" class="border border-gray-300 rounded-lg py-2 font-medium hover:bg-gray-50 transition">
                            Google
                        </button>
                        <!-- <button type="button" class="border border-gray-300 rounded-lg py-2 font-medium hover:bg-gray-50 transition">
                            GitHub
                        </button> -->
                    </div>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        Sudah memiliki akun?
                        <a href="/login.html" class="text-green-600 hover:text-green-700 font-medium">
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
        const emailError = document.getElementById("emailError");
        const passwordError = document.getElementById("passwordError");
        const confirmError = document.getElementById("confirmError");

        form.addEventListener("submit", (e) => {
        e.preventDefault();

        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const confirm = form.confirmPassword.value.trim();

        let valid = true;

        emailError.classList.add("hidden");
        passwordError.classList.add("hidden");
        confirmError.classList.add("hidden");

        if (!email.includes("@")) {
            emailError.classList.remove("hidden");
            valid = false;
        }

        if (password.length < 6 || password.length > 20) {
            passwordError.classList.remove("hidden");
            valid = false;
        }

        if (password !== confirm) {
            confirmError.classList.remove("hidden");
            valid = false;
        }

        if (valid) {
            alert("Account created successfully!");
            form.reset();
        }
        });
    </script>
@endsection