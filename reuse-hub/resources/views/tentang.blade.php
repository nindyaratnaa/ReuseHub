@extends('layouts.main')

@section('title', 'Tentang Kami - ReuseHub')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-green-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                ReuseHub — Di mana setiap transaksi membantu bumi
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Jangan buang, ceritakan ulang! Tukar barang Anda, bantu yang membutuhkan, dan 
                jadikan kebiasaan guna ulang sebagai gaya hidup baru kita.
            </p>
        </div>
    </section>

    <!-- Misi & Visi Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Misi Kami</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Menciptakan ekosistem digital yang memungkinkan setiap orang untuk berkontribusi 
                        dalam mengurangi limbah dengan cara yang mudah, menyenangkan, dan bermanfaat. 
                        Kami percaya bahwa setiap barang memiliki cerita dan potensi untuk memberikan 
                        manfaat kepada orang lain.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">Mengurangi limbah rumah tangga melalui pertukaran barang</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">Membangun komunitas peduli lingkungan yang saling mendukung</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">Memberikan akses mudah untuk berbagi dan mendapatkan barang berkualitas</p>
                        </div>
                    </div>
                </div>
                <div class="bg-green-50 p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Menjadi platform terdepan dalam gerakan ekonomi sirkular di Indonesia, 
                        di mana setiap rumah tangga dapat berkontribusi aktif dalam menjaga 
                        kelestarian lingkungan melalui praktik guna ulang yang berkelanjutan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai-Nilai Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Prinsip-prinsip yang memandu setiap langkah kami dalam membangun masa depan yang lebih berkelanjutan
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Peduli Lingkungan</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Setiap tindakan kami didorong oleh komitmen untuk mengurangi dampak negatif 
                        terhadap lingkungan dan menciptakan masa depan yang lebih hijau.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Komunitas</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Membangun hubungan yang kuat antar pengguna, menciptakan rasa saling 
                        percaya dan gotong royong dalam berbagi sumber daya.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Inovasi</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Terus mengembangkan solusi teknologi yang memudahkan proses pertukaran 
                        dan meningkatkan pengalaman pengguna.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dampak Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Dampak Positif Bersama</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Pencapaian yang telah kita raih bersama dalam menciptakan perubahan positif
                </p>
            </div>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">10rb+</div>
                    <p class="text-gray-600">Pengguna Aktif</p>
                    <p class="text-sm text-gray-500 mt-1">Yang bergabung dalam gerakan ini</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">25rb+</div>
                    <p class="text-gray-600">Barang Ditukar</p>
                    <p class="text-sm text-gray-500 mt-1">Berhasil menemukan pemilik baru</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">15 Ton</div>
                    <p class="text-gray-600">Limbah Berkurang</p>
                    <p class="text-sm text-gray-500 mt-1">Dari tempat pembuangan akhir</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">50+</div>
                    <p class="text-gray-600">Kota Terjangkau</p>
                    <p class="text-sm text-gray-500 mt-1">Di seluruh Indonesia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="py-16 bg-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Bagaimana ReuseHub Bekerja?</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Proses sederhana yang memungkinkan Anda berkontribusi untuk lingkungan
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Unggah Barang</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Foto dan deskripsikan barang yang ingin Anda tukar. Ceritakan kondisi 
                        dan alasan mengapa barang tersebut masih berharga.
                    </p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Temukan Pasangan</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Jelajahi barang-barang menarik dari pengguna lain. Temukan yang Anda 
                        butuhkan dan ajukan pertukaran yang saling menguntungkan.
                    </p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tukar & Nikmati</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Lakukan pertukaran dengan aman melalui sistem kami. Nikmati barang 
                        'baru' Anda sambil berkontribusi untuk planet yang lebih hijau.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-green-500 to-green-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Bergabung dalam Gerakan Guna Ulang?
            </h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Mulai perjalanan Anda menuju gaya hidup yang lebih berkelanjutan. 
                Setiap barang yang Anda tukar adalah langkah kecil untuk perubahan besar.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-green-600 font-semibold px-8 py-3 rounded-lg hover:bg-gray-50 transition duration-200">
                    Mulai Sekarang
                </button>
                <button class="border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-green-600 transition duration-200">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>
    </section>
@endsection