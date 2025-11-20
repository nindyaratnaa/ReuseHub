@extends('layouts.main')

@section('title', 'Ulasan Pengguna - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/beranda" class="hover:text-green-600 transition">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="/profil" class="hover:text-green-600 transition">Profil</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Ulasan</span>
            </nav>
        </div>
    </section>

    <!-- Review Container -->
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- User Header -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-gray-200 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" 
                             alt="Jerome Polin" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 mb-1">Jerome Polin</h1>
                        <p class="text-gray-600 mb-2">Bergabung sejak Januari 2024</p>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-1">
                                <div class="flex text-yellow-400">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 ml-1">4.9</span>
                                <span class="text-gray-600">(47 ulasan)</span>
                            </div>
                            <span class="text-gray-600">•</span>
                            <span class="text-gray-600">47 Pertukaran Berhasil</span>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Reviews List -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Ulasan Pengguna</h2>

                <div class="space-y-6">
                    <!-- Review Item 1 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face" 
                                     alt="Sarah" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Sarah Wijaya</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
                                            <span class="text-sm text-gray-600">5.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">2 hari yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">Sangat puas dengan pertukaran barang! Jerome sangat ramah dan responsif. Barang yang diberikan sesuai dengan deskripsi dan kondisinya sangat baik. Proses pertukaran juga cepat dan mudah. Highly recommended! 👍</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Kualitas barang sesuai</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Penjual ramah</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Respon cepat</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Tukar Buku</span>
                                    <span>•</span>
                                    <span>Verified Purchase</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 2 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face" 
                                     alt="Ahmad" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Ahmad Rizki</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
                                            <span class="text-sm text-gray-600">5.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">1 minggu yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">Pengalaman tukar barang yang luar biasa! Jerome orangnya sangat terpercaya dan komunikatif. Barang elektronik yang saya tukar dengan dia masih berfungsi dengan baik. Terima kasih banyak!</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Kualitas barang sesuai</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Komunikasi baik</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tepat waktu</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Tukar Elektronik</span>
                                    <span>•</span>
                                    <span>Verified Purchase</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 3 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face" 
                                     alt="Maya" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Maya Sari</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
                                            <span class="text-sm text-gray-600">4.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">2 minggu yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">Jerome sangat profesional dalam bertransaksi. Barang yang ditukar sesuai ekspektasi, meskipun ada sedikit keterlambatan dalam pengiriman. Overall, pengalaman yang baik dan akan tukar barang lagi di masa depan.</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Kualitas barang sesuai</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Penjual ramah</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full">Tukar Pakaian</span>
                                    <span>•</span>
                                    <span>Verified Purchase</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 4 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face" 
                                     alt="Budi" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Budi Santoso</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
                                            <span class="text-sm text-gray-600">5.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">3 minggu yang lalu</span>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Kualitas barang sesuai</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Respon cepat</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Komunikasi baik</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full">Tukar Furniture</span>
                                    <span>•</span>
                                    <span>Verified Purchase</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Item 5 -->
                    <div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?w=100&h=100&fit=crop&crop=face" 
                                     alt="Lisa" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Lisa Permata</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">⭐⭐⭐⭐⭐</div>
                                            <span class="text-sm text-gray-600">5.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">1 bulan yang lalu</span>
                                </div>
                                <p class="text-gray-700 mb-3">Pertama kali tukar barang di ReuseHub dan langsung dapat pengalaman yang menyenangkan! Jerome sangat membantu dan sabar menjelaskan kondisi barang. Barang yang diterima sesuai deskripsi dan packaging rapi. Terima kasih!</p>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Penjual ramah</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Komunikasi baik</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded-full">Tukar Aksesoris</span>
                                    <span>•</span>
                                    <span>Verified Purchase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection