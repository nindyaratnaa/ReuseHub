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
                <span class="text-gray-900 font-medium">{{ $item->nama_barang }}</span>
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
                        <img src="{{ $item->foto ? (str_starts_with($item->foto, 'http') ? $item->foto : asset('storage/'.$item->foto)) : 'https://via.placeholder.com/600x400' }}" alt="{{ $item->nama_barang }}" class="w-full h-96 object-cover">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="mb-4">
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">{{ $item->kategori }}</span>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $item->nama_barang }}</h1>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ $item->lokasi }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">{{ $item->kondisi }}</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $item->deskripsi }}</p>
                    </div>

                    <div class="border-t pt-6 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr($item->user->name, 0, 2)) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $item->user->name }}</h4>
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/>
                                        </svg>
                                        <span class="text-sm text-gray-600 ml-1">{{ number_format($item->user->average_rating, 1) }} ({{ $item->user->total_reviews }} ulasan)</span>
                                    </div>
                                    <span class="text-sm text-gray-500">•</span>
                                    <span class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <a href="/chat?item_id={{ $item->id }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Ajukan Tukar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @php
                $relatedItems = App\Models\Item::where('kategori', $item->kategori)
                    ->where('id', '!=', $item->id)
                    ->take(4)
                    ->get();
            @endphp
            
            @if($relatedItems->count() > 0)
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Barang Serupa</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedItems as $related)
                    <a href="/tukardetail/{{ $related->id }}" class="bg-gray-50 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img src="{{ $related->foto ? (str_starts_with($related->foto, 'http') ? $related->foto : asset('storage/'.$related->foto)) : 'https://via.placeholder.com/400x300' }}" alt="{{ $related->nama_barang }}" class="w-full h-32 object-cover">
                        <div class="p-3">
                            <h4 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-1">{{ $related->nama_barang }}</h4>
                            <p class="text-gray-600 text-xs mb-2 line-clamp-2">{{ Str::limit($related->deskripsi, 60) }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span>{{ $related->lokasi }}</span>
                                <span class="bg-gray-200 px-2 py-1 rounded">{{ $related->kondisi }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>



@endsection