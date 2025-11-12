@extends('layouts.main')

@section('title', 'Halaman Utama')

@section('content')
    <!-- Section landing -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-10">
            
            <!-- Kiri: Teks -->
            <div class="flex-1 space-y-6">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                    ReuseHub — Di mana setiap transaksi membantu bumi.
                </h2>
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-md">
                    Jangan buang, ceritakan ulang! Tukar barang Anda, bantu yang membutuhkan, dan 
                    jadikan kebiasaan guna ulang sebagai gaya hidup baru kita.
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

    <!-- Section Ulasan -->
    <section class="py-20 bg-green-50">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Judul -->
            <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-green-500 mb-4">
                Dipercaya selama lebih dari 5 tahun
            </h2>
            <p class="text-xl text-gray-500">
                Lihat apa yang mereka katakan tentang kami
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
                        "Fast, friendly, and eco-conscious — the perfect way to declutter responsibly!"
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Abim</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
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
                        "A brilliant idea that connects people and saves the planet, one swap at a time."
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Hani</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
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
                        "Such a meaningful platform! I can declutter my home while helping reduce waste. It’s a small action that makes a big difference."
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Vio</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial Grid -->
            <div class="mt-8 grid md:grid-cols-3 gap-8">
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
                        "Finally, a platform that turns recycling into something fun and easy. Love the eco-friendly mission!"
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Abim</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
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
                        "I've met amazing people through this app — everyone's so kind and honest. It really feels like a community."
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Hani</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
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
                        "The process is smooth, and the design is clean. I never thought exchanging things could be this simple."
                    </p>
                    <div>
                        <div class="font-semibold text-gray-900">Mama Vio</div>
                        <div class="text-sm text-gray-500">Wali Murid</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<script>
  // Animasi muncul saat discroll ke tampilan
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
</script>

@endsection