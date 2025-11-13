@extends('layouts.main')

@section('title', 'Beranda - ReuseHub')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-green-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-12">
            
            <!-- Kiri: Teks -->
            <div class="flex-1 space-y-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    ReuseHub — Di mana setiap transaksi membantu bumi
                </h1>
                <p class="text-gray-600 text-lg md:text-xl leading-relaxed">
                    Jangan buang, ceritakan ulang! Tukar barang Anda, bantu yang membutuhkan, dan 
                    jadikan kebiasaan guna ulang sebagai gaya hidup baru kita.
                </p>

                <!-- Tombol CTA -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition duration-200">
                        Mulai Tukar Sekarang
                    </button>
                    <button class="border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold px-8 py-3 rounded-lg transition duration-200">
                        Pelajari Lebih Lanjut
                    </button>
                </div>

                <!-- Statistik -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="text-center">
                        <p class="text-3xl font-bold text-green-600">10k+</p>
                        <p class="text-sm text-gray-600">Pengguna Aktif</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-green-600">25k+</p>
                        <p class="text-sm text-gray-600">Barang Ditukar</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-bold text-green-600 flex items-center justify-center gap-1">
                            4.8 <span class="text-yellow-400">★</span>
                        </p>
                        <p class="text-sm text-gray-600">Rating Pengguna</p>
                    </div>
                </div>
            </div>

            <!-- Kanan: Visual -->
            <div class="flex-1 flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                        <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <!-- Floating elements -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih ReuseHub?</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Platform terpercaya untuk pertukaran barang yang aman, mudah, dan bermanfaat bagi lingkungan
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Aman & Terpercaya</h3>
                    <p class="text-gray-600">Sistem verifikasi pengguna dan rating untuk memastikan transaksi yang aman dan terpercaya.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Mudah Digunakan</h3>
                    <p class="text-gray-600">Interface yang intuitif memudahkan Anda untuk mengunggah, mencari, dan menukar barang.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Ramah Lingkungan</h3>
                    <p class="text-gray-600">Setiap pertukaran membantu mengurangi limbah dan mendukung ekonomi sirkular.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Ulasan -->
    <section class="py-16 bg-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Judul -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Apa Kata Pengguna Kami?
                </h2>
                <p class="text-lg text-gray-600">
                    Bergabunglah dengan ribuan pengguna yang telah merasakan manfaatnya
                </p>
            </div>

            <!-- Testimonial Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-sm opacity-0 translate-y-5 transition-all duration-700">
                    <div class="flex gap-1 mb-4 text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "ReuseHub membantu saya memberikan kehidupan baru pada barang-barang yang sudah tidak terpakai. Prosesnya mudah dan aman!"
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Sari Dewi</div>
                        <div class="text-sm text-gray-500">Ibu Rumah Tangga</div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-sm opacity-0 translate-y-5 transition-all duration-700">
                    <div class="flex gap-1 mb-4 text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "Aplikasi yang brilian! Saya bisa mendapatkan barang yang dibutuhkan sambil membantu mengurangi sampah. Win-win solution!"
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Ahmad Rizki</div>
                        <div class="text-sm text-gray-500">Mahasiswa</div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-sm opacity-0 translate-y-5 transition-all duration-700">
                    <div class="flex gap-1 mb-4 text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "Platform yang sangat bermakna! Saya bisa merapikan rumah sambil membantu mengurangi limbah. Aksi kecil dengan dampak besar."
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Maya Putri</div>
                        <div class="text-sm text-gray-500">Pegawai Swasta</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Berita & Acara -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Berita & Acara Terbaru</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Ikuti perkembangan terbaru ReuseHub dan acara-acara menarik seputar guna ulang
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="relative aspect-video bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="absolute top-4 left-4">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">Berita</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
                                </svg>
                                15 Des 2024
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                5 min baca
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">ReuseHub Raih 25.000 Transaksi Pertukaran</h3>
                        <p class="text-gray-600 mb-4">Platform ReuseHub berhasil mencapai milestone 25.000 transaksi pertukaran barang, membuktikan antusiasme masyarakat terhadap gaya hidup berkelanjutan.</p>
                        <a href="#" class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition-colors">
                            Baca Selengkapnya
                            <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="relative aspect-video bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                        </svg>
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">Acara</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
                                </svg>
                                20 Des 2024
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                Jakarta
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Workshop Guna Ulang Kreatif</h3>
                        <p class="text-gray-600 mb-4">Bergabunglah dalam workshop gratis untuk belajar mengubah barang bekas menjadi karya seni yang bernilai. Daftar sekarang, tempat terbatas!</p>
                        <a href="#" class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition-colors">
                            Daftar Acara
                            <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="relative aspect-video bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="absolute top-4 left-4">
                            <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm">Tips</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
                                </svg>
                                12 Des 2024
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                3 min baca
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">5 Tips Sukses Menukar Barang di ReuseHub</h3>
                        <p class="text-gray-600 mb-4">Pelajari strategi jitu untuk mendapatkan barang impian melalui pertukaran. Dari foto yang menarik hingga deskripsi yang tepat.</p>
                        <a href="#" class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition-colors">
                            Baca Tips
                            <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-gray-600 text-lg">
                    Temukan jawaban untuk pertanyaan umum seputar ReuseHub
                </p>
            </div>
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="faq-item bg-white rounded-lg shadow-sm">
                    <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFAQ(this)">
                        <span class="font-semibold text-gray-900">Bagaimana cara memulai pertukaran barang di ReuseHub?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Daftar akun gratis, unggah foto barang yang ingin ditukar dengan deskripsi yang jelas, lalu jelajahi barang lain yang tersedia. Ajukan pertukaran dan tunggu persetujuan dari pemilik barang.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item bg-white rounded-lg shadow-sm">
                    <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFAQ(this)">
                        <span class="font-semibold text-gray-900">Apakah ada biaya untuk menggunakan ReuseHub?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        ReuseHub sepenuhnya gratis! Tidak ada biaya pendaftaran, biaya transaksi, atau biaya tersembunyi lainnya. Kami berkomitmen menjaga platform tetap gratis untuk mendukung gerakan guna ulang.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item bg-white rounded-lg shadow-sm">
                    <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFAQ(this)">
                        <span class="font-semibold text-gray-900">Bagaimana keamanan transaksi dijamin?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Kami memiliki sistem verifikasi pengguna, rating dan review, serta panduan keamanan bertransaksi. Semua komunikasi dapat dilacak melalui platform untuk memastikan transparansi.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item bg-white rounded-lg shadow-sm">
                    <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFAQ(this)">
                        <span class="font-semibold text-gray-900">Jenis barang apa saja yang bisa ditukar?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Hampir semua barang dalam kondisi layak pakai bisa ditukar: elektronik, buku, pakaian, perabot, mainan, dan lainnya. Barang yang dilarang meliputi makanan, obat-obatan, dan barang berbahaya.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item bg-white rounded-lg shadow-sm">
                    <button class="faq-question w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-colors" onclick="toggleFAQ(this)">
                        <span class="font-semibold text-gray-900">Bagaimana jika barang yang diterima tidak sesuai deskripsi?</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 text-gray-600 hidden">
                        Anda dapat melaporkan masalah melalui sistem dispute resolution kami. Tim support akan membantu mediasi dan mencari solusi terbaik untuk kedua belah pihak.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-green-500 to-green-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Memulai Perjalanan Guna Ulang Anda?
            </h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan komunitas ReuseHub dan mulai berkontribusi untuk planet yang lebih hijau hari ini juga.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-green-600 font-semibold px-8 py-3 rounded-lg hover:bg-gray-50 transition duration-200">
                    Daftar Sekarang
                </button>
                <button class="border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white hover:text-green-600 transition duration-200">
                    Jelajahi Barang
                </button>
            </div>
        </div>
    </section>

<script>
    // Animasi muncul saat scroll
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-5');
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.testimonial-card').forEach(card => {
        observer.observe(card);
    });

    // FAQ Toggle Function
    function toggleFAQ(button) {
        const answer = button.nextElementSibling;
        const icon = button.querySelector('svg');
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            answer.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }
</script>

@endsection