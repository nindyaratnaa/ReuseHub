<footer class="bg-gray-50 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900">Reuse Hub</h3>
                <p class="text-gray-500 text-sm">Satu Barang Reuse, Satu Aksi Nyata.</p>
                <div class="flex space-x-4"></div>
            </div>

            <!-- Product Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-gray-900">Produk</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                </ul>
            </div>

            <!-- Company Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 text-gray-900">ReuseHub</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                    <li><a href="https://careers.example.com" target="_blank" rel="noopener noreferrer"
                        class="text-gray-500 hover:text-green-600 transition-colors text-sm">Text</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-center text-gray-500 text-sm">
                <span id="year"></span> Reuse Hub.
            </p>
        </div>
    </div>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
