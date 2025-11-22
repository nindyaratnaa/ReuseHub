@extends('layouts.main')

@section('title', 'Beri Rating - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/chat" class="hover:text-green-600 transition">Chat</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Beri Rating</span>
            </nav>
        </div>
    </section>

    <!-- Rating Container -->
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm p-8">
                
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Bagaimana pengalaman tukar barang Anda?</h1>
                    <p class="text-gray-600">Rating Anda membantu pengguna lain mendapatkan pengalaman yang lebih baik</p>
                </div>

                <!-- User Info -->
                @php
                    $ratedUserId = request('user_id');
                    $ratedUser = $ratedUserId ? \App\Models\User::find($ratedUserId) : null;
                @endphp
                @if($ratedUser)
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg mb-6">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="font-semibold text-white">{{ strtoupper(substr($ratedUser->name, 0, 2)) }}</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $ratedUser->name }}</h3>
                        <p class="text-sm text-gray-600">Pertukaran Barang</p>
                    </div>
                </div>
                @endif

                <form id="ratingForm">
                    <!-- Star Rating -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Berikan rating Anda</h3>
                        <div class="flex justify-center gap-2 mb-4">
                            <button type="button" onclick="setRating(1)" class="star-btn p-2" data-rating="1">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                            <button type="button" onclick="setRating(2)" class="star-btn p-2" data-rating="2">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                            <button type="button" onclick="setRating(3)" class="star-btn p-2" data-rating="3">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                            <button type="button" onclick="setRating(4)" class="star-btn p-2" data-rating="4">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                            <button type="button" onclick="setRating(5)" class="star-btn p-2" data-rating="5">
                                <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                        </div>
                        <p id="ratingText" class="text-center text-gray-500 text-sm">Pilih rating Anda</p>
                    </div>

                    <!-- Rating Categories -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Apa yang membuat pengalaman Anda baik?</h3>
                        <p class="text-sm text-gray-600 mb-4">Pilih semua yang sesuai</p>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="kualitas_barang" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Kualitas barang sesuai</span>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="penjual_ramah" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Penjual ramah</span>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="respon_cepat" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Respon cepat</span>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="tepat_waktu" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Tepat waktu</span>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="komunikasi_baik" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Komunikasi baik</span>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="checkbox" name="categories" value="lokasi_strategis" class="sr-only">
                                <div class="checkbox-custom w-5 h-5 border-2 border-gray-300 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-green-600 hidden" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700">Lokasi strategis</span>
                            </label>
                        </div>
                    </div>

                    <!-- Review Text -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Punya sepatah dua kata?</h3>
                        <p class="text-sm text-gray-600 mb-4">Ceritakan pengalaman Anda untuk membantu pengguna lain</p>
                        <textarea id="reviewText" 
                                  placeholder="Tulis ulasan Anda di sini..."
                                  class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                                  rows="4"></textarea>
                    </div>

                    <!-- Anonymous Toggle -->
                    <!-- <div class="mb-8">
                        <label class="flex items-center justify-between p-4 border border-gray-200 rounded-lg cursor-pointer">
                            <div>
                                <h4 class="font-medium text-gray-900">Tampilkan nama saya</h4>
                                <p class="text-sm text-gray-600">Ulasan akan ditampilkan dengan nama Jerome Polin</p>
                            </div>
                            <div class="relative">
                                <input type="checkbox" id="showName" class="sr-only" checked>
                                <div class="toggle-bg w-12 h-6 bg-green-600 rounded-full shadow-inner"></div>
                                <div class="toggle-dot absolute w-4 h-4 bg-white rounded-full shadow top-1 right-1 transition"></div>
                            </div>
                        </label>
                    </div> -->

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <button type="button" onclick="window.location.href='/chat'" 
                                class="flex-1 border border-gray-300 text-gray-700 hover:bg-gray-50 font-semibold py-3 rounded-lg transition">
                            Lewati
                        </button>
                        <button type="button" onclick="submitRating()" 
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition">
                            Kirim Rating
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<script>
    let selectedRating = 0;
    const ratingTexts = {
        1: "Sangat buruk",
        2: "Buruk", 
        3: "Biasa saja",
        4: "Baik",
        5: "Sangat baik"
    };

    function setRating(rating) {
        selectedRating = rating;
        const stars = document.querySelectorAll('.star-btn svg');
        const ratingText = document.getElementById('ratingText');
        
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
        
        ratingText.textContent = ratingTexts[rating];
        ratingText.classList.remove('text-gray-500');
        ratingText.classList.add('text-gray-900', 'font-medium');
    }

    // Handle checkbox styling
    document.querySelectorAll('input[name="categories"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const customCheckbox = this.parentElement.querySelector('.checkbox-custom');
            const checkIcon = customCheckbox.querySelector('svg');
            
            if (this.checked) {
                customCheckbox.classList.add('bg-green-600', 'border-green-600');
                checkIcon.classList.remove('hidden');
            } else {
                customCheckbox.classList.remove('bg-green-600', 'border-green-600');
                checkIcon.classList.add('hidden');
            }
        });
    });

    // Handle toggle switch
    document.getElementById('showName').addEventListener('change', function() {
        const toggleBg = this.parentElement.querySelector('.toggle-bg');
        const toggleDot = this.parentElement.querySelector('.toggle-dot');
        const description = this.parentElement.querySelector('p');
        
        if (this.checked) {
            toggleBg.classList.add('bg-green-600');
            toggleBg.classList.remove('bg-gray-300');
            toggleDot.classList.add('right-1');
            toggleDot.classList.remove('left-1');
            description.textContent = 'Ulasan akan ditampilkan dengan nama Jerome Polin';
        } else {
            toggleBg.classList.remove('bg-green-600');
            toggleBg.classList.add('bg-gray-300');
            toggleDot.classList.remove('right-1');
            toggleDot.classList.add('left-1');
            description.textContent = 'Ulasan akan ditampilkan sebagai anonim';
        }
    });

    async function submitRating() {
        if (selectedRating === 0) {
            alert('Silakan pilih rating terlebih dahulu');
            return;
        }

        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('user_id');

        if (!userId) {
            alert('User ID tidak ditemukan');
            return;
        }

        const selectedCategories = Array.from(document.querySelectorAll('input[name="categories"]:checked'))
            .map(cb => cb.value);
        const reviewText = document.getElementById('reviewText').value;

        const komentar = reviewText + (selectedCategories.length > 0 ? '\n\nKategori: ' + selectedCategories.join(', ') : '');

        try {
            const response = await fetch('/rating/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    user_id: userId,
                    rating: selectedRating,
                    komentar: komentar
                })
            });

            const data = await response.json();

            if (data.success) {
                const successDiv = document.createElement('div');
                successDiv.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                successDiv.innerHTML = `
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>${data.message}</span>
                    </div>
                `;
                document.body.appendChild(successDiv);

                setTimeout(() => {
                    successDiv.remove();
                    window.location.href = '/tukar';
                }, 2000);
            }
        } catch (error) {
            alert('Terjadi kesalahan saat mengirim rating');
        }
    }
</script>

@endsection