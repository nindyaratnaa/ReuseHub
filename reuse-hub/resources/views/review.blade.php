@extends('layouts.main')

@section('title', 'Ulasan Pengguna - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                @if(request('from') == 'item')
                    <a href="/tukar" class="hover:text-green-600 transition">Tukar Barang</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-900 font-medium">Ulasan {{ $user->name }}</span>
                @else
                    <a href="/beranda" class="hover:text-green-600 transition">Beranda</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="/profil" class="hover:text-green-600 transition">Profil</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-900 font-medium">Ulasan</span>
                @endif
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
                        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&size=150&background=10b981&color=fff' }}" 
                             alt="{{ $user->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->name }}</h1>
                        <p class="text-gray-600 mb-2">Bergabung sejak {{ $user->created_at->format('F Y') }}</p>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-1">
                                @php
                                    $avgRating = $user->average_rating;
                                    $fullStars = floor($avgRating);
                                @endphp
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $fullStars ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="font-semibold text-gray-900 ml-1">{{ number_format($avgRating, 1) }}</span>
                                <span class="text-gray-600">({{ $user->total_reviews }} ulasan)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Reviews List -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Ulasan Pengguna</h2>

                @if($reviews->count() > 0)
                <div class="space-y-6">
                    @foreach($reviews as $review)
                    <div class="{{ !$loop->last ? 'border-b border-gray-200 pb-6' : '' }}">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden flex-shrink-0">
                                <img src="{{ $review->reviewer->avatar ? asset('storage/'.$review->reviewer->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($review->reviewer->name).'&size=100&background=10b981&color=fff' }}" 
                                     alt="{{ $review->reviewer->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $review->reviewer->name }}</h4>
                                        <div class="flex items-center gap-2">
                                            <div class="flex text-yellow-400 text-sm">
                                                @for($i = 1; $i <= $review->rating; $i++)⭐@endfor
                                            </div>
                                            <span class="text-sm text-gray-600">{{ $review->rating }}.0</span>
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                @if($review->komentar)
                                <p class="text-gray-700 mb-3">{{ $review->komentar }}</p>
                                @endif
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Pertukaran Barang</span>
                                    <span>•</span>
                                    <span>Verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Ulasan</h3>
                    <p class="text-gray-600">Belum ada ulasan untuk pengguna ini.</p>
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection