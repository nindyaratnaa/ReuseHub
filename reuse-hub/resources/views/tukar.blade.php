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
        <a href="/unggah" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Unggah Barang
        </a>
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
                                <input type="checkbox" name="kategori[]" value="Elektronik" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Elektronik</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="kategori[]" value="Buku & Majalah" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Buku & Majalah</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="kategori[]" value="Pakaian" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Pakaian</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="kategori[]" value="Perabot" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Perabot</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="kategori[]" value="Mainan" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Mainan</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="kategori[]" value="Olahraga" class="filter-checkbox rounded border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Olahraga</span>
                            </label>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <select id="lokasiFilter" name="lokasi" class="filter-select w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none">
                            <option value="">Semua Lokasi</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Jakarta Selatan">Jakarta Selatan</option>
                            <option value="Jakarta Pusat">Jakarta Pusat</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Medan">Medan</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Semarang">Semarang</option>
                        </select>
                    </div>

                    <!-- Kondisi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="kondisi" value="" class="filter-radio border-gray-300 text-green-600 focus:ring-green-500" checked>
                                <span class="ml-2 text-sm text-gray-700">Semua Kondisi</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="kondisi" value="Seperti Baru" class="filter-radio border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Seperti Baru</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="kondisi" value="Baik" class="filter-radio border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Baik</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="kondisi" value="Cukup" class="filter-radio border-gray-300 text-green-600 focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Cukup</span>
                            </label>
                        </div>
                    </div>

                    <!-- Reset Filter -->
                    <button id="resetFilter" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 rounded-lg transition duration-200">
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
                    <p class="text-gray-600 text-sm mt-2">Menampilkan <span id="resultCount">{{ $items->count() }}</span> dari <span id="totalCount">{{ $items->total() }}</span> barang</p>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productsGrid">
                    <!-- Product cards will be generated by JavaScript -->
                </div>

                <!-- Pagination -->
                <div class="flex flex-col items-center mt-8" id="paginationContainer">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const STORAGE_URL = "{{ asset('storage') }}";
</script>

<script>
    // Get items from backend
    let items = @json($items->items());

    // Sample product data for fallback
    // const products = [
    // {
    //     id: 1,
    //     name: "iPhone 12 Pro",
    //     description: "Kondisi sangat baik, lengkap dengan charger dan case",
    //     location: "Jakarta Selatan",
    //     condition: "Seperti Baru",
    //     category: "Elektronik",
    //     image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop",
    //     owner: "Ahmad Rizki",
    //     postedDate: "2 hari lalu"
    // },
    // {
    //     id: 2,
    //     name: "Novel Harry Potter Set",
    //     description: "Koleksi lengkap 7 buku, kondisi masih bagus",
    //     location: "Bandung",
    //     condition: "Baik",
    //     category: "Buku & Majalah",
    //     image: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400&h=300&fit=crop",
    //     owner: "Sari Dewi",
    //     postedDate: "1 hari lalu"
    // },
    // {
    //     id: 3,
    //     name: "Jaket Denim Vintage",
    //     description: "Jaket denim vintage ukuran M, warna biru klasik",
    //     location: "Yogyakarta",
    //     condition: "Baik",
    //     category: "Pakaian",
    //     image: "https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=300&fit=crop",
    //     owner: "Maya Putri",
    //     postedDate: "3 hari lalu"
    // },
    // {
    //     id: 4,
    //     name: "Kursi Gaming",
    //     description: "Kursi gaming ergonomis, masih nyaman dipakai",
    //     location: "Surabaya",
    //     condition: "Cukup",
    //     category: "Perabot",
    //     image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop",
    //     owner: "Budi Santoso",
    //     postedDate: "4 hari lalu"
    // },
    // {
    //     id: 5,
    //     name: "LEGO Architecture Set",
    //     description: "Set LEGO lengkap dengan manual, kondisi prima",
    //     location: "Jakarta Pusat",
    //     condition: "Seperti Baru",
    //     category: "Mainan",
    //     image: "https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop",
    //     owner: "Andi Wijaya",
    //     postedDate: "5 hari lalu"
    // },
    // {
    //     id: 6,
    //     name: "Sepeda Lipat Polygon",
    //     description: "Sepeda lipat 20 inch, jarang dipakai, mulus",
    //     location: "Medan",
    //     condition: "Seperti Baru",
    //     category: "Olahraga",
    //     image: "https://unsplash.com/id/foto/sepeda-merah-duduk-di-dalam-kotak-kardus-VLi8aw4O2n4",
    //     owner: "Lisa Permata",
    //     postedDate: "1 minggu lalu"
    // }
    // ];

    // Function to create product card
    function createProductCard(product) {
        return `
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 cursor-pointer" onclick="goToDetail(${product.id})">
                <div class="relative">
                    <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs font-medium">${product.category}</span>
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
        grid.innerHTML = items.map(item => createProductCard({
            id: item.id,
            name: item.nama_barang,
            description: item.deskripsi,
            location: item.lokasi,
            condition: item.kondisi,
            category: item.kategori,
            image: item.foto ? 
                (item.foto.startsWith('http') ? item.foto : `${STORAGE_URL}/${item.foto}`) : 'https://via.placeholder.com/400x300',
            owner: item.user?.name || 'Unknown',
            postedDate: new Date(item.created_at).toLocaleDateString('id-ID')
        })).join('');
    }

    // Function to navigate to detail page
    function goToDetail(productId) {
        window.location.href = `/tukardetail/${productId}`;
    }

    // Filter functionality
    function applyFilters() {
        const search = document.getElementById('mainSearch').value;
        const kategori = Array.from(document.querySelectorAll('input[name="kategori[]"]:checked')).map(cb => cb.value);
        const lokasi = document.getElementById('lokasiFilter').value;
        const kondisi = document.querySelector('input[name="kondisi"]:checked')?.value || '';

        const params = new URLSearchParams();
        if (search) params.append('search', search);
        kategori.forEach(k => params.append('kategori[]', k));
        if (lokasi) params.append('lokasi', lokasi);
        if (kondisi) params.append('kondisi', kondisi);

        fetch(`/tukar?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                items = data.items;
                renderProducts();
                document.getElementById('resultCount').textContent = data.items.length;
                document.getElementById('totalCount').textContent = data.total;
            });
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        renderProducts();

        // Search
        const searchInput = document.getElementById('mainSearch');
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(applyFilters, 500);
        });

        // Filter listeners
        document.querySelectorAll('.filter-checkbox, .filter-radio').forEach(el => {
            el.addEventListener('change', applyFilters);
        });

        document.getElementById('lokasiFilter').addEventListener('change', applyFilters);

        // Reset filter
        document.getElementById('resetFilter').addEventListener('click', function() {
            document.getElementById('mainSearch').value = '';
            document.querySelectorAll('.filter-checkbox').forEach(cb => cb.checked = false);
            document.getElementById('lokasiFilter').value = '';
            document.querySelector('input[name="kondisi"][value=""]').checked = true;
            applyFilters();
        });
    });
</script>

@endsection