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
            <!-- Judul -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-green-500 mb-4">
                    Dipercaya selama lebih dari 5 tahun
                </h2>
                <p class="text-xl text-gray-500">
                    Lihat apa yang mereka katakan tentang kami
                </p>
            </div>
        <!-- Container untuk menampung testimonial -->
        <div id="testimonialContainer" class="max-w-7xl mx-auto px-4 grid gap-8 md:grid-cols-3"></div>
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

 const testimonials = [
    {
      content: "Finally, a platform that turns recycling into something fun and easy. Love the eco-friendly mission!",
      author: "Mama Abim",
      role: "Wali Murid",
      rating: 5
    },
    {
      content: "I've met amazing people through this app — everyone's so kind and honest. It really feels like a community.",
      author: "Mama Hani",
      role: "Wali Murid",
      rating: 5
    },
    {
      content: "The process is smooth, and the design is clean. I never thought exchanging things could be this simple.",
      author: "Mama Vio",
      role: "Wali Murid",
      rating: 5
    },
    {
      content: "Terimakasih telah membersamai putra putri kami mengembangkan bakatnya menjadi versi terbaik dirinya.",
      author: "Mama Abim",
      role: "Wali Murid",
      rating: 5
    },
    {
      content: "Semoga semakin sukses dan jaya selaku menginspirasi dan membersamai sahabat mitra untuk mengekspresikan jiwa seni dan kreatifitasnya.",
      author: "Mama Hani",
      role: "Wali Murid",
      rating: 5
    },
    {
      content: "Maju dan sukses selalu dalam berkreasi dan berkarya. Mengajar penuh kasih dan telaten dalam mengembangkan potensi anak-anak.",
      author: "Mama Vio",
      role: "Wali Murid",
      rating: 5
    }
  ];

  const container = document.getElementById("testimonialContainer");

    testimonials.forEach(t => {
        const stars = Array.from({ length: 5 }, (_, i) =>
        `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ${i < t.rating ? 'text-yellow-400' : 'text-gray-300'} fill-current" viewBox="0 0 20 20">
            <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/>
        </svg>`
        ).join('');

        const card = `
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between mb-3"></div>
                <div class="flex gap-1 mb-4 text-yellow-400">${stars}</div>           
                <p class="text-gray-600  mb-4">${t.content}</p>
                <div>
                    <h3 class="font-semibold text-gray-900">${t.author}</h3>
                    <p class="text-sm text-gray-500">${t.role}</p>
                </div>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", card);
    });
</script>



@endsection