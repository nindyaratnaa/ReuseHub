<header class="bg-gray-900 text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-green-400 hover:text-green-300 transition duration-300">
            ReuseHub
        </a>

        <!-- Navigation (desktop) -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/') }}" class="block hover:text-green-400 transition">Beranda</a>
            <a href="{{ url('/about') }}" class="block hover:text-green-400 transition">Tentang</a>
            <a href="{{ url('/profile') }}" class="block hover:text-green-400 transition">Layanan</a>
            <a href="{{ url('/profile') }}" class="block hover:text-green-400 transition">Kontak</a>
        </nav>

        <!-- Tombol CTA -->
        <div class="hidden md:block">
            <a href="#"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded-full transition duration-300 shadow-md">
                Mulai Sekarang
            </a>
        </div>

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle" class="md:hidden text-gray-300 hover:text-green-400 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2 bg-gray-800">
        <a href="{{ url('/') }}" class="block hover:text-green-400 transition">Beranda</a>
        <a href="{{ url('/about') }}" class="block hover:text-green-400 transition">Tentang</a>
        <a href="{{ url('/profile') }}" class="block hover:text-green-400 transition">Layanan</a>
        <a href="#"
            class="block text-center bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded-full transition duration-300 shadow-md">
            Mulai Sekarang
        </a>
    </div>
</header>


