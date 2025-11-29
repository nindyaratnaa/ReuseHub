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
        <div class="mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden flex" style="height: 80vh;">
                
                <!-- Chat List Sidebar -->
                <div class="w-1/4 border-r border-gray-200 flex flex-col">
                    <!-- Sidebar Header -->
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Pesan</h2>
                    </div>
                    
                    <!-- Chat List -->
                    <div class="flex-1 overflow-y-auto" id="chatList">
                        <div class="p-4 text-center text-gray-500">
                            <p class="text-sm">Memuat percakapan...</p>
                        </div>
                    </div>
                </div>
                
                <!-- Chat Area -->
                <div class="flex-1 flex flex-col" id="chatArea">
                    <!-- Chat Header -->
                    <div class="bg-green-600 text-white p-4 border-b border-green-700" id="chatHeader">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="font-semibold text-sm" id="chatHeaderInitials">?</span>
                            </div>
                            <div>
                                <h3 class="font-semibold" id="chatHeaderName">Pilih percakapan</h3>
                                <p class="text-green-100 text-sm" id="chatHeaderStatus">Pilih chat untuk memulai percakapan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Exchange Item Display -->
                    <div class="bg-blue-50 border-b border-blue-200 p-4" id="itemDisplay" style="display: none;">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <img id="itemImage" src="" alt="" class="w-16 h-16 object-cover rounded-lg">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-blue-800">Barang yang Ingin Ditukar</span>
                                </div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="font-semibold text-gray-900" id="itemName"></h4>
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium" id="itemCategory"></span>
                                </div>
                                <p class="text-sm text-gray-600" id="itemDetails"></p>
                            </div>
                            <div class="text-right">
                                <button onclick="completeTransaction()" 
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
                    <div class="flex-1 overflow-y-auto p-4 space-y-4" id="chatMessages">
                        <!-- Welcome Message -->
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Pilih Percakapan</h3>
                            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                                Pilih percakapan dari daftar di sebelah kiri untuk memulai chat.
                            </p>
                        </div>
                    </div>

                    <!-- Quick Reply Options -->
                    <div class="border-t border-gray-200 p-4 bg-gray-50" id="quickReplies" style="display: none;">
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

                    <!-- Message Input -->
                    <div class="border-t border-gray-200 p-4" id="messageInputArea" style="display: none;">
                        <div class="flex items-end gap-3">
                            <button onclick="document.getElementById('fileUpload').click()" class="p-2 text-gray-500 hover:text-gray-700 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                            </button>
                            <input type="file" id="fileUpload" accept="image/*,application/pdf,.doc,.docx" class="hidden" onchange="handleFileUpload(event)">
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
        </div>
    </section>

<script src="{{ asset('js/chat.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentUserId = {{ auth()->id() }};
        const itemId = {{ request('item_id') ?? 'null' }};
        
        @if(request('item_id'))
            @php
                $chatItem = App\Models\Item::find(request('item_id'));
            @endphp
            @if($chatItem)
            const itemData = {
                id: {{ $chatItem->id }},
                name: '{{ addslashes($chatItem->nama_barang) }}',
                category: '{{ $chatItem->kategori }}',
                location: '{{ $chatItem->lokasi }}',
                condition: '{{ $chatItem->kondisi }}',
                image: '{{ $chatItem->foto ? (str_starts_with($chatItem->foto, 'http') ? $chatItem->foto : asset('storage/'.$chatItem->foto)) : 'https://via.placeholder.com/100' }}',
                owner: {
                    id: {{ $chatItem->user_id }},
                    name: '{{ addslashes($chatItem->user->name) }}',
                    initials: '{{ strtoupper(substr($chatItem->user->name, 0, 2)) }}'
                }
            };
            @else
            const itemData = null;
            @endif
        @else
            const itemData = null;
        @endif
        
        initChat(currentUserId, itemId, itemData);
        
        const messageInput = document.getElementById('messageInput');
        if (messageInput) {
            messageInput.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.min(this.scrollHeight, 120) + 'px';
            });
        }
    });
</script>

@endsection
