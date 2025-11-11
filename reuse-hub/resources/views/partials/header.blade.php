<header class="fixed top-0 left-0 w-full bg-gray-50 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-green-400 hover:text-green-300 transition duration-300">
            ReuseHub
        </a>

        <!-- Navigation (desktop) -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ url('/Beranda') }}" class="block hover:text-green-400 relative group transition-colors">Beranda
                 <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ url('/Profil') }}" class="block hover:text-green-400 relative group transition-colors">Profil
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ url('/Tukar') }}" class="block hover:text-green-400 relative group transition-colors">Tukar
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{ url('/Pasar') }}" class="block hover:text-green-400 relative group transition-colors">Pasar
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
            </a>
        </nav>

        <!-- Hamburger (mobile) -->
        <button id="menuToggle" class="md:hidden flex items-center justify-center w-10 h-10 rounded-md hover:bg-gray-100 dark:hover:bg-grey-900 transition">
            <!-- Ikon hamburger -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6 text-gray-600 dark:text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 5.25h16.5m-16.5 6.75h16.5m-16.5 6.75h16.5" />
            </svg>
        </button>
    </div>

    <!-- Sidebar Mobile -->
    <div id="mobileNav"
        class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-30">
        <div class="flex flex-col p-6 space-y-4">
            <button id="closeNav" class="self-end mb-4 hover:text-green-600 dark:hover:text-green-500">✕</button>
            <a href="{{ url('/Beranda') }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 transition">Tentang Kami</a>
            <a href="{{ url('/Beranda') }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 transition">Program</a>
            <a href="{{ url('/Beranda') }}" class="text-gray-700 dark:text-gray-300 hover:text-green-600 transition">Berita & Acara</a>
            <hr class="border-gray-200 dark:border-gray-700">
        </div>
    </div>
</header>

<script>
    // Scroll shadow
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 150) {
        navbar.classList.add('shadow-sm');
        } else {
        navbar.classList.remove('shadow-sm');
        }
    });

    // Toggle sidebar
    const menuToggle = document.getElementById('menuToggle');
    const mobileNav = document.getElementById('mobileNav');
    const closeNav = document.getElementById('closeNav');

    menuToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('translate-x-full');
    });

    closeNav.addEventListener('click', () => {
        mobileNav.classList.add('translate-x-full');
    });
</script>