let activeChat = null;
let lastMessageId = 0;
let messageCheckInterval = null;
let chatListInterval = null;

function initChat(currentUserId, itemId, itemData) {
    window.currentUserId = currentUserId;
    window.itemId = itemId;
    window.itemData = itemData;
    
    loadChatList();
    
    if (itemId && itemData) {
        openChatWithItem(itemId, itemData);
    }
    
    chatListInterval = setInterval(loadChatList, 5000);
}

function loadChatList() {
    fetch('/chat/list', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            renderChatList(data.chats);
        }
    })
    .catch(error => console.error('Error loading chat list:', error));
}

function renderChatList(chats) {
    const chatList = document.getElementById('chatList');
    
    if (chats.length === 0) {
        chatList.innerHTML = `
            <div class="p-4 text-center text-gray-500">
                <p class="text-sm">Belum ada percakapan</p>
            </div>
        `;
        return;
    }
    
    chatList.innerHTML = chats.map(chat => `
        <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer transition ${activeChat && activeChat.item_id === chat.item_id ? 'bg-gray-50' : ''}" 
             onclick="openChat(${chat.item_id}, ${chat.other_user.id}, '${chat.other_user.name}', '${chat.other_user.initials}', '${chat.item_name}', '${chat.item_image}')">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-white text-sm font-semibold">${chat.other_user.initials}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="font-semibold text-gray-900 truncate">${chat.other_user.name}</h4>
                        <span class="text-xs text-gray-500">${chat.created_at}</span>
                    </div>
                    <p class="text-sm text-gray-600 truncate">${chat.last_message}</p>
                    <p class="text-xs text-gray-400 mt-1">📦 ${chat.item_name}</p>
                </div>
            </div>
        </div>
    `).join('');
}

function openChatWithItem(itemId, itemData) {
    openChat(itemId, itemData.owner.id, itemData.owner.name, itemData.owner.initials, itemData.name, itemData.image, itemData);
}

function openChat(itemId, otherUserId, userName, userInitials, itemName, itemImage, fullItemData = null) {
    activeChat = {
        item_id: itemId,
        other_user_id: otherUserId,
        other_user_name: userName,
        other_user_initials: userInitials,
        item_name: itemName,
        item_image: itemImage
    };
    
    document.getElementById('chatHeaderName').textContent = userName;
    document.getElementById('chatHeaderInitials').textContent = userInitials;
    document.getElementById('chatHeaderStatus').textContent = 'Online';
    
    const itemDisplay = document.getElementById('itemDisplay');
    if (itemDisplay) {
        itemDisplay.style.display = 'block';
        document.getElementById('itemImage').src = itemImage;
        document.getElementById('itemImage').alt = itemName;
        document.getElementById('itemName').textContent = itemName;
        
        if (fullItemData) {
            document.getElementById('itemCategory').textContent = fullItemData.category;
            document.getElementById('itemDetails').textContent = fullItemData.location + ' • ' + fullItemData.condition;
        } else {
            document.getElementById('itemCategory').textContent = '';
            document.getElementById('itemDetails').textContent = '';
        }
    }
    
    document.getElementById('quickReplies').style.display = 'block';
    document.getElementById('messageInputArea').style.display = 'block';
    
    loadMessages();
    
    if (messageCheckInterval) {
        clearInterval(messageCheckInterval);
    }
    messageCheckInterval = setInterval(checkNewMessages, 2000);
}

function loadMessages() {
    if (!activeChat) return;
    
    fetch(`/chat/messages?item_id=${activeChat.item_id}&other_user_id=${activeChat.other_user_id}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML = '';
            
            if (data.messages.length === 0) {
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
            } else {
                data.messages.forEach(msg => {
                    if (msg.sender_id === window.currentUserId) {
                        addUserMessage(msg.message, msg.created_at);
                    } else {
                        addReceivedMessage(msg.message, msg.sender_name, msg.sender_initials, msg.created_at);
                    }
                    lastMessageId = Math.max(lastMessageId, msg.id);
                });
            }
        }
    })
    .catch(error => console.error('Error loading messages:', error));
}

function checkNewMessages() {
    if (!activeChat || lastMessageId === 0) return;
    
    fetch(`/chat/messages?item_id=${activeChat.item_id}&other_user_id=${activeChat.other_user_id}&last_id=${lastMessageId}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.messages.length > 0) {
            data.messages.forEach(msg => {
                if (msg.sender_id === window.currentUserId) {
                    addUserMessage(msg.message, msg.created_at);
                } else {
                    addReceivedMessage(msg.message, msg.sender_name, msg.sender_initials, msg.created_at);
                }
                lastMessageId = Math.max(lastMessageId, msg.id);
            });
            loadChatList();
        }
    })
    .catch(error => console.error('Error checking new messages:', error));
}

function sendMessage(customMessage = null) {
    if (!activeChat) return;
    
    const messageInput = document.getElementById('messageInput');
    const message = customMessage || messageInput.value.trim();
    
    if (!message) return;
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch('/chat/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            item_id: activeChat.item_id,
            receiver_id: activeChat.other_user_id,
            message: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const chatMessages = document.getElementById('chatMessages');
            const welcomeMsg = chatMessages.querySelector('.text-center.py-8');
            if (welcomeMsg) {
                chatMessages.innerHTML = '';
            }
            
            addUserMessage(data.message.message, data.message.created_at);
            lastMessageId = Math.max(lastMessageId, data.message.id);
            
            if (!customMessage) {
                messageInput.value = '';
                messageInput.style.height = 'auto';
            }
            
            loadChatList();
        }
    })
    .catch(error => console.error('Error sending message:', error));
}

function sendQuickMessage(message) {
    sendMessage(message);
}

function addUserMessage(message, time) {
    const chatMessages = document.getElementById('chatMessages');
    const userMessageDiv = document.createElement('div');
    userMessageDiv.className = 'flex justify-end';
    userMessageDiv.innerHTML = `
        <div class="max-w-xs lg:max-w-md">
            <div class="bg-green-600 text-white p-3 rounded-lg rounded-br-none">
                <p class="text-sm">${escapeHtml(message)}</p>
            </div>
            <p class="text-xs text-gray-500 mt-1 text-right">${time}</p>
        </div>
    `;
    
    chatMessages.appendChild(userMessageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function addReceivedMessage(message, senderName, senderInitials, time) {
    const chatMessages = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'flex justify-start';
    messageDiv.innerHTML = `
        <div class="max-w-xs lg:max-w-md">
            <div class="flex items-center gap-2 mb-1">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <span class="text-white text-xs font-semibold">${senderInitials}</span>
                </div>
                <span class="text-sm font-medium text-gray-900">${escapeHtml(senderName)}</span>
            </div>
            <div class="bg-gray-100 text-gray-900 p-3 rounded-lg rounded-bl-none">
                <p class="text-sm">${escapeHtml(message)}</p>
            </div>
            <p class="text-xs text-gray-500 mt-1">${time}</p>
        </div>
    `;
    
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function handleKeyPress(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendMessage();
    }
}

function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}

function completeTransaction() {
    alert('Fitur transaksi selesai akan segera tersedia!');
}

function handleFileUpload(event) {
    alert('Fitur upload file akan segera tersedia!');
    event.target.value = '';
}
