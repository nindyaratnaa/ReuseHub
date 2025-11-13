@extends('layouts.main')

@section('title', 'Detail Barang - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/tukar" class="hover:text-green-600 transition">Tukar Barang</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium" id="breadcrumbTitle">Detail Barang</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-8 mb-8">
                
                <!-- Product Images -->
                <div class="space-y-4">
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                        <img id="mainImage" src="" alt="" class="w-full h-96 object-cover">
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        <img src="" alt="" class="w-full h-20 object-cover rounded-lg border-2 border-green-500 cursor-pointer">
                        <img src="" alt="" class="w-full h-20 object-cover rounded-lg border-2 border-transparent hover:border-green-500 cursor-pointer transition">
                        <img src="" alt="" class="w-full h-20 object-cover rounded-lg border-2 border-transparent hover:border-green-500 cursor-pointer transition">
                        <img src="" alt="" class="w-full h-20 object-cover rounded-lg border-2 border-transparent hover:border-green-500 cursor-pointer transition">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="mb-4">
                        <span id="categoryBadge" class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium"></span>
                    </div>
                    
                    <h1 id="productTitle" class="text-3xl font-bold text-gray-900 mb-4"></h1>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span id="productLocation" class="text-gray-600"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span id="productCondition" class="text-gray-600"></span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi</h3>
                        <p id="productDescription" class="text-gray-600 leading-relaxed"></p>
                    </div>

                    <div class="border-t pt-6 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                            <div>
                                <h4 id="ownerName" class="font-semibold text-gray-900"></h4>
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/>
                                        </svg>
                                        <span class="text-sm text-gray-600 ml-1">4.8 (24 ulasan)</span>
                                    </div>
                                    <span class="text-sm text-gray-500">•</span>
                                    <span id="postedDate" class="text-sm text-gray-500"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Ajukan Tukar
                        </button>
                        <button class="px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                        <button class="px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Barang Serupa</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="relatedProducts">
                    <!-- Related products will be generated by JavaScript -->
                </div>
            </div>
        </div>
    </section>

<script>
    // Sample product data (same as tukar.blade.php)
    const products = [
        {
            id: 1,
            name: "iPhone 12 Pro",
            description: "iPhone 12 Pro dalam kondisi sangat baik, lengkap dengan charger original dan case pelindung. Tidak ada goresan atau kerusakan, baterai masih awet. Cocok untuk yang mencari smartphone premium dengan harga terjangkau melalui sistem tukar.",
            location: "Jakarta Selatan",
            condition: "Seperti Baru",
            category: "Elektronik",
            image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=600&h=400&fit=crop",
            owner: "Ahmad Rizki",
            postedDate: "2 hari lalu"
        },
        {
            id: 2,
            name: "Novel Harry Potter Set",
            description: "Koleksi lengkap 7 buku Harry Potter dalam bahasa Indonesia. Kondisi masih bagus, cover tidak rusak, halaman tidak ada yang sobek. Cocok untuk penggemar fantasy atau yang ingin memulai membaca seri ini.",
            location: "Bandung",
            condition: "Baik",
            category: "Buku & Majalah",
            image: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&h=400&fit=crop",
            owner: "Sari Dewi",
            postedDate: "1 hari lalu"
        },
        {
            id: 3,
            name: "Jaket Denim Vintage",
            description: "Jaket denim vintage ukuran M dengan warna biru klasik. Bahan berkualitas tinggi, model timeless yang tidak pernah ketinggalan zaman. Cocok untuk gaya kasual sehari-hari.",
            location: "Yogyakarta",
            condition: "Baik",
            category: "Pakaian",
            image: "https://images.unsplash.com/photo-1551028719-00167b16eac5?w=600&h=400&fit=crop",
            owner: "Maya Putri",
            postedDate: "3 hari lalu"
        }
    ];

    // Get product ID from URL
    function getProductId() {
        const path = window.location.pathname;
        const id = path.split('/').pop();
        return parseInt(id) || 1;
    }

    // Load product detail
    function loadProductDetail() {
        const productId = getProductId();
        const product = products.find(p => p.id === productId) || products[0];
        
        // Update page content
        document.getElementById('breadcrumbTitle').textContent = product.name;
        document.getElementById('mainImage').src = product.image;
        document.getElementById('mainImage').alt = product.name;
        document.getElementById('categoryBadge').textContent = product.category;
        document.getElementById('productTitle').textContent = product.name;
        document.getElementById('productLocation').textContent = product.location;
        document.getElementById('productCondition').textContent = product.condition;
        document.getElementById('productDescription').textContent = product.description;
        document.getElementById('ownerName').textContent = product.owner;
        document.getElementById('postedDate').textContent = product.postedDate;
        
        // Update thumbnail images
        const thumbnails = document.querySelectorAll('img[src=""]');
        thumbnails.forEach(thumb => {
            thumb.src = product.image;
            thumb.alt = product.name;
        });
    }

    // Load related products
    function loadRelatedProducts() {
        const currentId = getProductId();
        const relatedProducts = products.filter(p => p.id !== currentId).slice(0, 4);
        
        const container = document.getElementById('relatedProducts');
        container.innerHTML = relatedProducts.map(product => `
            <div class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300 cursor-pointer" onclick="goToDetail(${product.id})">
                <img src="${product.image}" alt="${product.name}" class="w-full h-32 object-cover">
                <div class="p-3">
                    <h4 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-1">${product.name}</h4>
                    <p class="text-gray-600 text-xs mb-2 line-clamp-2">${product.description.substring(0, 60)}...</p>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span>${product.location}</span>
                        <span class="bg-gray-200 px-2 py-1 rounded">${product.condition}</span>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Navigate to detail page
    function goToDetail(productId) {
        window.location.href = `/tukardetail/${productId}`;
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        loadProductDetail();
        loadRelatedProducts();
    });
</script>

@endsection