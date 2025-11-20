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
                            @if(request('item_id') && isset($chatItem))
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="font-semibold text-sm">{{ strtoupper(substr($chatItem->user->name, 0, 2)) }}</span>
                            </div>
                            <div>
                                <h3 class="font-semibold">{{ $chatItem->user->name }}</h3>
                                <p class="text-green-100 text-sm">Online • Terakhir dilihat baru saja</p>
                            </div>
                            @else
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="font-semibold text-sm">AR</span>
                            </div>
                            <div>
                                <h3 class="font-semibold">Ahmad Rizki</h3>
                                <p class="text-green-100 text-sm">Online • Terakhir dilihat baru saja</p>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>

                <!-- Exchange Item Display -->
                @if(request('item_id'))
                    @php
                        $chatItem = App\Models\Item::find(request('item_id'));
                    @endphp
                    @if($chatItem)
                    <div class="bg-blue-50 border-b border-blue-200 p-4">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <img src="{{ $chatItem->foto ? asset('storage/'.$chatItem->foto) : 'https://via.placeholder.com/100' }}" 
                                     alt="{{ $chatItem->nama_barang }}" class="w-16 h-16 object-cover rounded-lg">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-blue-800">Barang yang Ingin Ditukar</span>
                                </div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="font-semibold text-gray-900">{{ $chatItem->nama_barang }}</h4>
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">{{ $chatItem->kategori }}</span>
                                </div>
                                <p class="text-sm text-gray-600">{{ $chatItem->lokasi }} • {{ $chatItem->kondisi }}</p>
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
                    @endif
                @endif

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
    </section>

<!-- Demo Mode Toggle -->
<div class="fixed top-4 right-4 z-50">
    <div class="bg-white rounded-lg shadow-lg p-3 border">
        <div class="flex items-center gap-2 mb-2">
            <span class="text-sm font-medium text-gray-700">Demo Mode:</span>
            <select id="userSelect" onchange="switchUser()" class="text-sm border border-gray-300 rounded px-2 py-1">
                <option value="user1">User 1 (Jerome)</option>
                <option value="user2">User 2 (Ahmad)</option>
            </select>
        </div>
        <p class="text-xs text-gray-500">Buka 2 tab, pilih user berbeda di masing-masing tab</p>
    </div>
</div>

<script>
    let messageCount = 0;
    let currentUser = 'user1';
    const itemId = '{{ request("item_id") ?? "demo" }}';
    const chatKey = `chat_${itemId}`;
    
    // User data
    const users = {
        user1: { name: 'Jerome Polin', initials: 'JP' },
        user2: { name: 'Ahmad Rizki', initials: 'AR' }
    };

    function switchUser() {
        currentUser = document.getElementById('userSelect').value;
        loadMessages();
    }

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
        
        // Save message to localStorage
        saveMessage(message, currentUser);
        
        // Add user message immediately
        addUserMessage(message);
        
        // Clear input if not custom message
        if (!customMessage) {
            messageInput.value = '';
        }
        
        messageCount++;
    }

    function saveMessage(message, sender) {
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        const newMessage = {
            id: Date.now(),
            message: message,
            sender: sender,
            timestamp: new Date().toISOString()
        };
        messages.push(newMessage);
        localStorage.setItem(chatKey, JSON.stringify(messages));
    }

    function addUserMessage(message) {
        const chatMessages = document.getElementById('chatMessages');
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
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function addReceivedMessage(message, senderName, senderInitials) {
        const chatMessages = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex justify-start';
        messageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs font-semibold">${senderInitials}</span>
                    </div>
                    <span class="text-sm font-medium text-gray-900">${senderName}</span>
                </div>
                <div class="bg-gray-100 text-gray-900 p-3 rounded-lg rounded-bl-none">
                    <p class="text-sm">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1">Baru saja</p>
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function loadMessages() {
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        const chatMessages = document.getElementById('chatMessages');
        
        if (messages.length > 0) {
            chatMessages.innerHTML = '';
            messageCount = messages.length;
            
            messages.forEach(msg => {
                if (msg.sender === currentUser) {
                    addUserMessage(msg.message);
                } else {
                    const otherUser = msg.sender === 'user1' ? users.user1 : users.user2;
                    addReceivedMessage(msg.message, otherUser.name, otherUser.initials);
                }
            });
        }
    }

    function checkNewMessages() {
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        
        if (messages.length > messageCount) {
            const newMessages = messages.slice(messageCount);
            
            newMessages.forEach(msg => {
                if (msg.sender !== currentUser) {
                    const otherUser = msg.sender === 'user1' ? users.user1 : users.user2;
                    addReceivedMessage(msg.message, otherUser.name, otherUser.initials);
                }
            });
            
            messageCount = messages.length;
        }
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

    // Handle file upload (demo)
    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            const chatMessages = document.getElementById('chatMessages');
            
            if (messageCount === 0) {
                chatMessages.innerHTML = '';
            }
            
            const fileMessageDiv = document.createElement('div');
            fileMessageDiv.className = 'flex justify-end';
            
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    fileMessageDiv.innerHTML = `
                        <div class="max-w-xs lg:max-w-md">
                            <div class="bg-green-600 text-white p-3 rounded-lg rounded-br-none">
                                <img src="${e.target.result}" alt="Uploaded image" class="w-full h-auto rounded mb-2">
                                <p class="text-sm">📷 Foto dikirim</p>
                            </div>
                            <p class="text-xs text-gray-500 mt-1 text-right">Baru saja</p>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                fileMessageDiv.innerHTML = `
                    <div class="max-w-xs lg:max-w-md">
                        <div class="bg-green-600 text-white p-3 rounded-lg rounded-br-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium">${file.name}</p>
                                    <p class="text-xs opacity-75">${(file.size / 1024).toFixed(1)} KB</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 text-right">Baru saja</p>
                    </div>
                `;
            }
            
            chatMessages.appendChild(fileMessageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // Save file message
            saveMessage(`📷 ${file.name}`, currentUser);
            messageCount++;
            
            event.target.value = '';
        }
    }

    // Initialize demo
    document.addEventListener('DOMContentLoaded', function() {
        loadMessages();
        
        // Check for new messages every 2 seconds
        setInterval(checkNewMessages, 2000);
        
        // Clear demo data button (for testing)
        const clearBtn = document.createElement('button');
        clearBtn.textContent = 'Clear Chat';
        clearBtn.className = 'text-xs bg-red-500 text-white px-2 py-1 rounded mt-2 w-full';
        clearBtn.onclick = function() {
            localStorage.removeItem(chatKey);
            document.getElementById('chatMessages').innerHTML = `
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
            `;
            messageCount = 0;
        };
        document.querySelector('.fixed.top-4.right-4 .bg-white').appendChild(clearBtn);
    });
</script>

@endsection