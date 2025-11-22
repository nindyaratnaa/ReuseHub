<header class="fixed top-0 left-0 w-full bg-gray-50 border-t border-gray-200 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-green-400 hover:text-green-300 transition duration-300">
            ReuseHub
        </a>

        <!-- Tombol desktop -->
        <div class="hidden md:flex items-center gap-4">
            <a href="{{ url('/masuk') }}" class="text-sm font-medium text-gray-600 hover:text-green-600 transition-colors">
                Masuk
            </a>
            <a href="{{ url('/daftar') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                Daftar
            </a>
        </div>

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
            <button id="closeNav" class="self-end mb-4 hover:text-green-600">✕</button>
            <a href="{{ url('/masuk') }}" class=" text-center hover:text-green-600 transition">Masuk</a>
            <a href="{{ url('/daftar') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-lg text-center">Daftar</a>
        </div>
    </div>
</header>

<script>
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