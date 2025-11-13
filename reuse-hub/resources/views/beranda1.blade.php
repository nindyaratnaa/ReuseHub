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
                <button href="/daftar" class="bg-green-500 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200">
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
    <section class="py-20 bg-green-900">
            <!-- Judul -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Dipercaya selama lebih dari 5 tahun
                </h2>
                <p class="text-xl text-gray-200">
                    Lihat apa yang mereka katakan tentang kami
                </p>
            </div>
        <!-- Container untuk menampung testimonial -->
        <div id="testimonialContainer" class="max-w-7xl mx-auto px-4 grid gap-8 md:grid-cols-3"></div>
    </section>

    <!-- Section Artikel -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-green-500 mb-4">
                            Berita & Acara
                        </h2>
                    </div>
                <div id="articleContainer" class="grid md:grid-cols-2 gap-8"></div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 bg-green-900">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">
                    Frequently Asked Questions
                </h2>

                <div class="space-y-8">
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            Can I change plans later?
                        </h3>
                        <p class="text-gray-600">
                            Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            What payment methods do you accept?
                        </h3>
                        <p class="text-gray-600">
                            We accept all major credit cards, PayPal, and bank transfers for annual plans.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            Is there a free trial?
                        </h3>
                        <p class="text-gray-600">
                            Yes, all plans come with a 14-day free trial. No credit card required to start.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            Do you offer refunds?
                        </h3>
                        <p class="text-gray-600">
                            Yes, we offer a 30-day money-back guarantee if you're not satisfied with our service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Still have questions?
            </h2>
            <p class="text-xl text-gray-600 mb-8">
                Our team is here to help you choose the right plan for your business.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-all">
                    <a href="/login.html">
                        Masuk
                                </a>        
                </button>

                <button class="relative overflow-hidden group bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-200 hover:shadow-lg transition-all duration-300 text-gray-800 font-medium px-6 py-3 rounded-lg">
                    <span class="relative z-10">View Documentation</span>
                    <div class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </button>
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

    const testimonialContainer = document.getElementById("testimonialContainer");

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
        testimonialContainer.insertAdjacentHTML("beforeend", card);
    });

    const articles = [
        {
            title: "10 Ways to Optimize Your SaaS Business",
            excerpt: "Learn the best practices for growing and optimizing your SaaS business in today's competitive market.",
            author: "Sarah Johnson",
            date: "Mar 15, 2024",
            category: "Best Practices",
            readTime: "5 min read",
            image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
        },
        {
            title: "The Future of Cloud Computing",
            excerpt: "Explore the latest trends and innovations shaping the future of cloud computing and SaaS solutions.",
            author: "Michael Chen",
            date: "Mar 12, 2024",
            category: "Industry News",
            readTime: "8 min read",
            image: "https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
        },
        {
            title: "Getting Started with SaaSify",
            excerpt: "A comprehensive guide to help you get started with SaaSify and make the most of its features.",
            author: "Emily Rodriguez",
            date: "Mar 10, 2024",
            category: "Tutorials",
            readTime: "6 min read",
            image: "https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
        },
        {
            title: "How Company X Increased Revenue by 200%",
            excerpt: "A detailed case study of how Company X leveraged SaaSify to achieve remarkable growth.",
            author: "David Wilson",
            date: "Mar 8, 2024",
            category: "Case Studies",
            readTime: "7 min read",
            image: "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
        }
    ];

    const articleContainer = document.getElementById("articleContainer");

    articles.forEach((article) => {
        const card = `
            <article class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="relative aspect-video">
                    <img src="${article.image}" alt="${article.title}" class="object-cover w-full h-full">
                    <div class="absolute top-4 left-4">
                        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">${article.category}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-4">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.954 11.954 0 0112 15c2.183 0 4.21.584 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            ${article.author}
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
                            </svg>
                            ${article.date}
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 004 4h2a4 4 0 004-4V6H7v10z" />
                            </svg>
                            ${article.readTime}
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">${article.title}</h2>
                    <p class="text-gray-600 mb-4">${article.excerpt}</p>
                    <a href="#" class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition-colors">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    </a>
                </div>
            </article>
        `;
        articleContainer.insertAdjacentHTML("beforeend", card);
    });
</script>



@endsection