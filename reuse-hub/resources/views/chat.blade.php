@extends('layouts.main')

@section('title', 'Chat - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/tukar" class="hover:text-green-600 transition">Tukar Barang</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Chat</span>
            </nav>
        </div>
    </section>

    <!-- Chat Container -->
    <section class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                
                <!-- Chat Header -->
                <div class="bg-green-600 text-white p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="font-semibold text-sm">AR</span>
                            </div>
                            <div>
                                <h3 class="font-semibold">Ahmad Rizki</h3>
                                <p class="text-green-100 text-sm">Online • Terakhir dilihat baru saja</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Exchange Item Display -->
                <div class="bg-blue-50 border-b border-blue-200 p-4">
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=100&h=100&fit=crop" 
                                 alt="iPhone 12 Pro" class="w-16 h-16 object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                                <span class="text-sm font-medium text-blue-800">Barang yang Ingin Ditukar</span>
                            </div>
                            <div class="flex items-center gap-2 mb-1">
                                <h4 class="font-semibold text-gray-900">iPhone 12 Pro</h4>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Elektronik</span>
                            </div>
                            <p class="text-sm text-gray-600">Jakarta Selatan • Seperti Baru</p>
                        </div>
                        <div class="text-right">
                            <button onclick="window.location.href='/rating'" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm transition flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Transaksi Selesai
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages Area -->
                <div class="h-96 overflow-y-auto p-4 space-y-4" id="chatMessages">
                    <!-- Welcome Message -->
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mulai Percakapan</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            Jangan buang, ceritakan ulang! Tukar barang Anda, bantu yang membutuhkan, dan jadikan kebiasaan guna ulang sebagai gaya hidup baru kita. Mulai diskusi dengan pemilik barang untuk melakukan pertukaran yang saling menguntungkan.
                        </p>
                    </div>
                </div>

                <!-- Quick Reply Options -->
                <div class="border-t border-gray-200 p-4 bg-gray-50">
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 mb-3">Pilihan Pesan Cepat:</p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="sendQuickMessage('Halo! Saya tertarik dengan barang Anda. Bisakah kita diskusi lebih lanjut?')" 
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-50 transition">
                                💬 Silahkan Berdiskusi
                            </button>
                            <button onclick="sendQuickMessage('Saya ingin menukar barang ini. Apakah Anda berminat?')" 
                                    class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded-full text-sm hover:bg-green-200 transition">
                                🔄 Saya Mau Tukar Barang
                            </button>
                            <button onclick="sendQuickMessage('Bisakah saya melihat foto barang dari sudut yang berbeda?')" 
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-50 transition">
                                📷 Minta Foto Tambahan
                            </button>
                            <button onclick="sendQuickMessage('Apakah barang masih tersedia untuk ditukar?')" 
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-50 transition">
                                ✅ Cek Ketersediaan
                            </button>
                            <button onclick="sendQuickMessage('Bisakah kita bertemu untuk melihat barang secara langsung?')" 
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-50 transition">
                                🤝 Ajukan Pertemuan
                            </button>
                            <button onclick="sendQuickMessage('Terima kasih atas responnya! Saya akan pertimbangkan dulu.')" 
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-50 transition">
                                🙏 Terima Kasih
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="border-t border-gray-200 p-4">
                    <div class="flex items-end gap-3">
                        <button class="p-2 text-gray-500 hover:text-gray-700 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                        </button>
                        <div class="flex-1">
                            <textarea id="messageInput" 
                                      placeholder="Ketik pesan Anda di sini..." 
                                      class="w-full p-3 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                      rows="1"
                                      onkeypress="handleKeyPress(event)"></textarea>
                        </div>
                        <button onclick="sendMessage()" 
                                class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-lg transition duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </section>

<script>
    let messageCount = 0;

    function sendQuickMessage(message) {
        sendMessage(message);
    }

    function sendMessage(customMessage = null) {
        const messageInput = document.getElementById('messageInput');
        const message = customMessage || messageInput.value.trim();
        
        if (!message) return;
        
        const chatMessages = document.getElementById('chatMessages');
        
        // Clear welcome message on first message
        if (messageCount === 0) {
            chatMessages.innerHTML = '';
        }
        
        // Add user message
        const userMessageDiv = document.createElement('div');
        userMessageDiv.className = 'flex justify-end';
        userMessageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="bg-green-600 text-white p-3 rounded-lg rounded-br-none">
                    <p class="text-sm">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1 text-right">Baru saja</p>
            </div>
        `;
        
        chatMessages.appendChild(userMessageDiv);
        
        // Clear input if not custom message
        if (!customMessage) {
            messageInput.value = '';
        }
        
        // Auto scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        // Simulate response after delay
        setTimeout(() => {
            addBotResponse(message);
        }, 1000 + Math.random() * 2000);
        
        messageCount++;
    }

    function addBotResponse(userMessage) {
        const chatMessages = document.getElementById('chatMessages');
        const responses = {
            'diskusi': 'Tentu! Saya senang bisa berdiskusi dengan Anda. Barang ini masih dalam kondisi sangat baik dan saya rawat dengan baik.',
            'tukar': 'Wah, menarik! Saya lihat barang Anda juga bagus. Bisakah kita diskusikan detail pertukarannya? Mungkin kita bisa bertemu untuk melihat kondisi barang secara langsung.',
            'foto': 'Baik, saya akan kirimkan foto tambahan dari berbagai sudut. Tunggu sebentar ya!',
            'tersedia': 'Ya, barang masih tersedia dan siap untuk ditukar. Apakah Anda sudah memiliki barang yang ingin ditukarkan?',
            'bertemu': 'Ide bagus! Saya bisa bertemu di area Jakarta Selatan. Bagaimana kalau kita tentukan waktu dan tempat yang cocok untuk kita berdua?',
            'terima kasih': 'Sama-sama! Jangan ragu untuk menghubungi saya lagi jika ada pertanyaan atau sudah siap untuk melakukan pertukaran.'
        };
        
        let response = 'Terima kasih atas pesannya! Saya akan segera merespons.';
        
        // Find appropriate response
        for (let key in responses) {
            if (userMessage.toLowerCase().includes(key)) {
                response = responses[key];
                break;
            }
        }
        
        const botMessageDiv = document.createElement('div');
        botMessageDiv.className = 'flex justify-start';
        botMessageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs font-semibold">AR</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Ahmad Rizki</span>
                </div>
                <div class="bg-gray-100 text-gray-900 p-3 rounded-lg rounded-bl-none">
                    <p class="text-sm">${response}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1">Baru saja</p>
            </div>
        `;
        
        chatMessages.appendChild(botMessageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function handleKeyPress(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    }

    // Auto-resize textarea
    document.getElementById('messageInput').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });
</script>

@endsection