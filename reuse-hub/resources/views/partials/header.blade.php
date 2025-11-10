<header class="bg-gray-900 text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-green-400 hover:text-green-300 transition duration-300">
            ReuseHub
        </a>

        <!-- Navigation (desktop) -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/Beranda') }}" class="block hover:text-green-400 transition">Beranda</a>
            <a href="{{ url('/Profil') }}" class="block hover:text-green-400 transition">Profil</a>
            <a href="{{ url('/Tukar') }}" class="block hover:text-green-400 transition">Tukar</a>
            <a href="{{ url('/Pasar') }}" class="block hover:text-green-400 transition">Pasar</a>
        </nav>

        <!-- Hamburger (mobile) -->
        <button id="menu-toggle" class="md:hidden text-gray-300 hover:text-green-400 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2 bg-gray-800">
        <a href="{{ url('/Beranda') }}" class="block hover:text-green-400 transition">Beranda</a>
        <a href="{{ url('/Profil') }}" class="block hover:text-green-400 transition">Profil</a>
        <a href="{{ url('/Tukar') }}" class="block hover:text-green-400 transition">Tukar</a>
        <a href="{{ url('/Pasar') }}" class="block hover:text-green-400 transition">Pasar</a>
    </div>
</header>


