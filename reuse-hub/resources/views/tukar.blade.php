@extends('layouts.main')

@section('title', 'Tukar Barang - ReuseHub')

@section('content')
    <!-- Header Action Bar -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tukar Barang</h1>
                <p class="text-gray-600">Temukan barang yang Anda butuhkan atau unggah barang untuk ditukar</p>
            </div>
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Unggah Barang
            </button>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sidebar Filter -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Filter Barang</h3>
                        
                        <!-- Kategori -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Elektronik</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Buku & Majalah</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Pakaian</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Perabot</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Mainan</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Olahraga</span>
                                </label>
                            </div>
                        </div>

                        <!-- Lokasi -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none">
                                <option value="">Semua Lokasi</option>
                                <option value="jakarta">Jakarta</option>
                                <option value="bandung">Bandung</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="medan">Medan</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="semarang">Semarang</option>
                            </select>
                        </div>

                        <!-- Kondisi -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="kondisi" class="border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Semua Kondisi</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="kondisi" class="border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Seperti Baru</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="kondisi" class="border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Baik</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="kondisi" class="border-gray-300 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Cukup</span>
                                </label>
                            </div>
                        </div>

                        <!-- Reset Filter -->
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 rounded-lg transition duration-200">
                            Reset Filter
                        </button>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="lg:w-3/4">
                    <!-- Search Bar -->
                    <div class="bg-white rounded-lg p-4 shadow-sm mb-6">
                        <div class="relative">
                            <input type="text" id="mainSearch" placeholder="Cari barang yang ingin ditukar..." class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-sm mt-2">Menampilkan <span id="resultCount">6</span> dari 156 barang</p>
                    </div>

                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productsGrid">
                        <!-- Product cards will be generated by JavaScript -->
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">
                        <nav class="flex items-center gap-2">
                            <button class="px-3 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button class="px-3 py-2 bg-green-600 text-white rounded-lg">1</button>
                            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">2</button>
                            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">3</button>
                            <span class="px-3 py-2 text-gray-500">...</span>
                            <button class="px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">7</button>
                            <button class="px-3 py-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    // Sample product data
    const products = [
        {
            id: 1,
            name: "iPhone 12 Pro",
            description: "Kondisi sangat baik, lengkap dengan charger dan case",
            location: "Jakarta Selatan",
            condition: "Seperti Baru",
            category: "Elektronik",
            image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop",
            owner: "Ahmad Rizki",
            postedDate: "2 hari lalu"
        },
        {
            id: 2,
            name: "Novel Harry Potter Set",
            description: "Koleksi lengkap 7 buku, kondisi masih bagus",
            location: "Bandung",
            condition: "Baik",
            category: "Buku & Majalah",
            image: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400&h=300&fit=crop",
            owner: "Sari Dewi",
            postedDate: "1 hari lalu"
        },
        {
            id: 3,
            name: "Jaket Denim Vintage",
            description: "Jaket denim vintage ukuran M, warna biru klasik",
            location: "Yogyakarta",
            condition: "Baik",
            category: "Pakaian",
            image: "https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=300&fit=crop",
            owner: "Maya Putri",
            postedDate: "3 hari lalu"
        },
        {
            id: 4,
            name: "Kursi Gaming",
            description: "Kursi gaming ergonomis, masih nyaman dipakai",
            location: "Surabaya",
            condition: "Cukup",
            category: "Perabot",
            image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop",
            owner: "Budi Santoso",
            postedDate: "4 hari lalu"
        },
        {
            id: 5,
            name: "LEGO Architecture Set",
            description: "Set LEGO lengkap dengan manual, kondisi prima",
            location: "Jakarta Pusat",
            condition: "Seperti Baru",
            category: "Mainan",
            image: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop",
            owner: "Andi Wijaya",
            postedDate: "5 hari lalu"
        },
        {
            id: 6,
            name: "Sepeda Lipat Polygon",
            description: "Sepeda lipat 20 inch, jarang dipakai, mulus",
            location: "Medan",
            condition: "Seperti Baru",
            category: "Olahraga",
            image: "https://unsplash.com/id/foto/sepeda-merah-duduk-di-dalam-kotak-kardus-VLi8aw4O2n4",
            owner: "Lisa Permata",
            postedDate: "1 minggu lalu"
        }
    ];

    // Function to create product card
    function createProductCard(product) {
        return `
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 cursor-pointer" onclick="goToDetail(${product.id})">
                <div class="relative">
                    <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs font-medium">${product.category}</span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <button class="bg-white bg-opacity-80 hover:bg-opacity-100 p-2 rounded-full transition">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-2 line-clamp-1">${product.name}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">${product.description}</p>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            ${product.location}
                        </div>
                        <span class="bg-gray-100 px-2 py-1 rounded text-xs">${product.condition}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-700">${product.owner}</span>
                        </div>
                        <span class="text-xs text-gray-500">${product.postedDate}</span>
                    </div>
                </div>
            </div>
        `;
    }

    // Function to render products
    function renderProducts() {
        const grid = document.getElementById('productsGrid');
        grid.innerHTML = products.map(product => createProductCard(product)).join('');
    }

    // Function to navigate to detail page
    function goToDetail(productId) {
        window.location.href = `/tukardetail/${productId}`;
    }

    // Search functionality
    let filteredProducts = [...products];

    function searchProducts(query) {
        if (!query.trim()) {
            filteredProducts = [...products];
        } else {
            filteredProducts = products.filter(product => 
                product.name.toLowerCase().includes(query.toLowerCase()) ||
                product.description.toLowerCase().includes(query.toLowerCase()) ||
                product.category.toLowerCase().includes(query.toLowerCase())
            );
        }
        renderFilteredProducts();
        updateResultCount();
    }

    function renderFilteredProducts() {
        const grid = document.getElementById('productsGrid');
        grid.innerHTML = filteredProducts.map(product => createProductCard(product)).join('');
    }

    function updateResultCount() {
        document.getElementById('resultCount').textContent = filteredProducts.length;
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        renderProducts();
        
        // Add search event listener
        const searchInput = document.getElementById('mainSearch');
        searchInput.addEventListener('input', function(e) {
            searchProducts(e.target.value);
        });
    });
</script>

@endsection