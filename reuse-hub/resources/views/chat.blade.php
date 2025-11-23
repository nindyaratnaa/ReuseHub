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
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden flex" style="height: 80vh;">
                
                <!-- Chat List Sidebar -->
                <div class="w-1/3 border-r border-gray-200 flex flex-col">
                    <!-- Sidebar Header -->
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Pesan</h2>
                    </div>
                    
                    <!-- Chat List -->
                    <div class="flex-1 overflow-y-auto" id="chatList">
                        <!-- Chat list will be populated by JavaScript -->
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

                    <!-- Exchange Item Display (conditional) -->
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

<script>
    let messageCount = 0;
    let activeChat = null;
    const currentUserId = {{ auth()->id() ?? 1 }};
    const currentUserName = '{{ auth()->user()->name ?? "Jerome Polin" }}';
    const currentUserInitials = '{{ strtoupper(substr(auth()->user()->name ?? "Jerome Polin", 0, 2)) }}';
    const itemId = '{{ request("item_id") ?? "" }}';
    const csrfToken = '{{ csrf_token() }}';

    // Get all available chats from localStorage
    function getAllChats() {
        const allChats = [];
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key && key.startsWith('reusehub_chat_')) {
                const chatId = key.replace('reusehub_chat_', '');
                const messages = JSON.parse(localStorage.getItem(key) || '[]');
                if (messages.length > 0) {
                    const lastMessage = messages[messages.length - 1];
                    const otherUserId = lastMessage.sender_id === currentUserId ? 
                        messages.find(m => m.sender_id !== currentUserId)?.sender_id : lastMessage.sender_id;
                    const otherUser = messages.find(m => m.sender_id === otherUserId);
                    
                    if (otherUser) {
                        allChats.push({
                            chatId: chatId,
                            otherUser: {
                                id: otherUser.sender_id,
                                name: otherUser.sender_name,
                                initials: otherUser.sender_initials
                            },
                            lastMessage: lastMessage.message,
                            timestamp: lastMessage.timestamp,
                            unread: false
                        });
                    }
                }
            }
        }
        return allChats.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
    }

    function renderChatList() {
        const chatList = document.getElementById('chatList');
        const chats = getAllChats();
        
        if (chats.length === 0) {
            chatList.innerHTML = `
                <div class="p-4 text-center text-gray-500">
                    <p class="text-sm">Belum ada percakapan</p>
                </div>
            `;
            return;
        }
        
        chatList.innerHTML = chats.map(chat => `
            <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer transition" 
                 onclick="openChat('${chat.chatId}', '${chat.otherUser.name}', '${chat.otherUser.initials}')">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-sm font-semibold">${chat.otherUser.initials}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-semibold text-gray-900 truncate">${chat.otherUser.name}</h4>
                            <span class="text-xs text-gray-500">${formatTime(chat.timestamp)}</span>
                        </div>
                        <p class="text-sm text-gray-600 truncate">${chat.lastMessage}</p>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function formatTime(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const diff = now - date;
        
        if (diff < 60000) return 'Baru saja';
        if (diff < 3600000) return Math.floor(diff / 60000) + ' menit';
        if (diff < 86400000) return Math.floor(diff / 3600000) + ' jam';
        return Math.floor(diff / 86400000) + ' hari';
    }

    function openChat(chatId, userName, userInitials) {
        activeChat = chatId;
        
        // Update chat header
        document.getElementById('chatHeaderName').textContent = userName;
        document.getElementById('chatHeaderInitials').textContent = userInitials;
        document.getElementById('chatHeaderStatus').textContent = 'Online • Terakhir dilihat baru saja';
        
        // Show chat elements
        document.getElementById('quickReplies').style.display = 'block';
        document.getElementById('messageInputArea').style.display = 'block';
        
        // Load messages for this chat
        loadMessages(chatId);
    }

    function sendQuickMessage(message) {
        if (!activeChat) return;
        sendMessage(message);
    }

    function sendMessage(customMessage = null) {
        if (!activeChat) return;
        
        const messageInput = document.getElementById('messageInput');
        const message = customMessage || messageInput.value.trim();
        
        if (!message) return;
        
        const chatKey = `reusehub_chat_${activeChat}`;
        const chatMessages = document.getElementById('chatMessages');
        
        // Clear welcome message on first message
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        if (messages.length === 0) {
            chatMessages.innerHTML = '';
        }
        
        // Save message to localStorage
        saveMessage(message, activeChat);
        
        // Add user message immediately
        addUserMessage(message);
        
        // Clear input if not custom message
        if (!customMessage) {
            messageInput.value = '';
        }
        
        messageCount++;
        
        // Update chat list
        renderChatList();
    }

    function saveMessage(message, chatId) {
        const chatKey = `reusehub_chat_${chatId}`;
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        
        const newMessage = {
            id: Date.now(),
            message: message,
            sender_id: currentUserId,
            sender_name: currentUserName,
            sender_initials: currentUserInitials,
            item_id: chatId,
            timestamp: new Date().toISOString()
        };
        messages.push(newMessage);
        localStorage.setItem(chatKey, JSON.stringify(messages));
    }

    function addUserMessage(message, time = 'Baru saja') {
        const chatMessages = document.getElementById('chatMessages');
        const userMessageDiv = document.createElement('div');
        userMessageDiv.className = 'flex justify-end';
        userMessageDiv.innerHTML = `
            <div class="max-w-xs lg:max-w-md">
                <div class="bg-green-600 text-white p-3 rounded-lg rounded-br-none">
                    <p class="text-sm">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1 text-right">${time}</p>
            </div>
        `;
        
        chatMessages.appendChild(userMessageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function addReceivedMessage(message, senderName, senderInitials, time = 'Baru saja') {
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
                <p class="text-xs text-gray-500 mt-1">${time}</p>
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function loadMessages(chatId) {
        const chatKey = `reusehub_chat_${chatId}`;
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        const chatMessages = document.getElementById('chatMessages');
        
        if (messages.length > 0) {
            chatMessages.innerHTML = '';
            messageCount = messages.length;
            
            messages.forEach(msg => {
                if (msg.sender_id === currentUserId) {
                    addUserMessage(msg.message, formatTime(msg.timestamp));
                } else {
                    addReceivedMessage(msg.message, msg.sender_name, msg.sender_initials, formatTime(msg.timestamp));
                }
            });
        } else {
            chatMessages.innerHTML = `
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mulai Percakapan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Mulai diskusi dengan mengirim pesan pertama.
                    </p>
                </div>
            `;
        }
    }

    function checkNewMessages() {
        if (!activeChat) return;
        
        const chatKey = `reusehub_chat_${activeChat}`;
        const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
        
        if (messages.length > messageCount) {
            const newMessages = messages.slice(messageCount);
            
            newMessages.forEach(msg => {
                if (msg.sender_id !== currentUserId) {
                    addReceivedMessage(msg.message, msg.sender_name, msg.sender_initials, formatTime(msg.timestamp));
                }
            });
            
            messageCount = messages.length;
            renderChatList();
        }
    }

    function completeTransaction() {
        alert('Fitur transaksi selesai akan segera tersedia!');
    }

    function handleKeyPress(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    }

    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file && activeChat) {
            const chatMessages = document.getElementById('chatMessages');
            
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
            
            saveMessage(`📷 ${file.name}`, activeChat);
            messageCount++;
            renderChatList();
            
            event.target.value = '';
        }
    }

    // Initialize chat
    document.addEventListener('DOMContentLoaded', function() {
        renderChatList();
        
        // If there's an item_id, create/open that specific chat
        if (itemId) {
            const chatKey = `reusehub_chat_${itemId}`;
            const messages = JSON.parse(localStorage.getItem(chatKey) || '[]');
            
            if (messages.length === 0) {
                const otherUserName = 'Ahmad Rizki';
                const otherUserInitials = 'AR';
                openChat(itemId, otherUserName, otherUserInitials);
            } else {
                const lastMessage = messages[messages.length - 1];
                const otherUser = messages.find(m => m.sender_id !== currentUserId);
                if (otherUser) {
                    openChat(itemId, otherUser.sender_name, otherUser.sender_initials);
                }
            }
        }
        
        // Check for new messages every 2 seconds
        setInterval(checkNewMessages, 2000);
        setInterval(renderChatList, 5000);
        
        // Auto-resize textarea
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