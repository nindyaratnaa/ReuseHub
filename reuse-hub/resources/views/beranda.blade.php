@extends('layouts.main')

@section('title', 'Halaman Utama')

@section('content')
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-10">
            
            <!-- Kiri: Teks -->
            <div class="flex-1 space-y-6">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                    ReuseHub — where every trade helps the planet.
                </h2>
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-md">
                    Your old items don’t deserve the trash — they deserve a new story. 
                    Exchange them with others who need them, and let’s build a world 
                    where reuse becomes our everyday habit.
                </p>

                <!-- Tombol -->
                <button class="bg-green-500 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200">
                    Pelajari Lebih Lanjut &gt;
                </button>

                <!-- Statistik -->
                <div class="flex gap-8 pt-6">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">5+</p>
                        <p class="text-sm text-gray-600">Tahun Pengalaman</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">10rb+</p>
                        <p class="text-sm text-gray-600">Pengguna Aktif</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900 flex items-center gap-1">
                            4,5 <span class="text-black">★</span>
                        </p>
                        <p class="text-sm text-gray-600">Kepuasan Pengguna</p>
                    </div>
                </div>
            </div>

            <!-- Kanan: Gambar -->
            <div class="flex-1 flex justify-center">
                <img src="CARI GAMBARNYA" alt="Reusable cups" class="max-w-sm md:max-w-md object-contain">
            </div>

        </div>
    </section>

@endsection