# Update Sistem Chat dengan AJAX

## Perubahan yang Dilakukan

### 1. Backend (ChatController.php)
- **sendMessage()**: Mengirim pesan dengan AJAX, menyimpan ke database
- **getMessages()**: Mengambil pesan berdasarkan item_id dan user yang chat
- **getChatList()**: Mengambil daftar semua percakapan user dengan info barang

### 2. Model (Message.php)
- Menambahkan relasi `item()` untuk mengakses data barang

### 3. Routes (web.php)
- Menambahkan route `/chat/list` untuk mendapatkan daftar chat

### 4. Frontend (chat.blade.php & chat.js)
- Menggunakan AJAX untuk realtime chat
- Menampilkan daftar chat dengan nama barang
- Menampilkan detail barang yang sedang ditukar
- Auto-refresh pesan setiap 2 detik
- Auto-refresh daftar chat setiap 5 detik

### 5. Layout (main.blade.php)
- Menambahkan CSRF token meta tag untuk AJAX requests

## Cara Kerja

### Skenario Chat:
1. **User A** melihat barang **User B** di halaman tukar detail
2. **User A** klik "Ajukan Tukar" → redirect ke `/chat?item_id={id}`
3. Sistem otomatis membuka chat dengan **User B** (pemilik barang)
4. Nama yang tertampil adalah nama **User B** (pemilik barang)
5. Detail barang tertampil di bagian atas chat
6. Pesan tersimpan di database dan bisa diakses kapan saja
7. Riwayat chat bisa diakses dari header menu "Pesan"

### Fitur:
- ✅ Chat realtime dengan AJAX
- ✅ Riwayat chat tersimpan di database
- ✅ Menampilkan barang yang sedang ditukar
- ✅ Daftar chat dengan info barang
- ✅ Quick reply buttons
- ✅ Auto-refresh messages
- ✅ Responsive design

## File yang Diubah/Dibuat:
1. `app/Http/Controllers/ChatController.php` - Update
2. `app/Models/Message.php` - Update
3. `routes/web.php` - Update
4. `resources/views/chat.blade.php` - Update
5. `resources/views/layouts/main.blade.php` - Update
6. `public/js/chat.js` - Baru (file JavaScript terpisah)

## Testing:
1. Login sebagai User A
2. Buka halaman tukar, pilih barang User B
3. Klik "Ajukan Tukar"
4. Kirim pesan ke User B
5. Login sebagai User B di browser lain
6. Buka menu "Pesan" di header
7. Lihat chat dari User A dan balas
8. Kedua user bisa chat realtime
