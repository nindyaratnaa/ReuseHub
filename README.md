# Reuse Hub

Platform digital untuk pertukaran dan berbagi barang bekas yang masih layak pakai, mendukung ekonomi sirkular dan mengurangi limbah.

## 📝 Deskripsi

Reuse Hub adalah aplikasi web yang memungkinkan pengguna untuk:
- Mengunggah barang bekas yang masih layak pakai
- Mencari dan menemukan barang yang dibutuhkan
- Melakukan pertukaran barang dengan pengguna lain
- Berkomunikasi melalui sistem chat terintegrasi
- Memberikan review dan rating untuk pengguna lain

Platform ini bertujuan untuk mengurangi limbah dengan memperpanjang siklus hidup barang dan menciptakan komunitas yang peduli lingkungan.

## ✨ Fitur Utama

### 🔐 Autentikasi & Profil
- Registrasi dan login pengguna
- Manajemen profil lengkap (avatar, bio, kontak)
- Sistem admin untuk moderasi

### 📦 Manajemen Barang
- Upload barang dengan foto dan deskripsi detail
- Kategorisasi barang (elektronik, furniture, pakaian, dll)
- Filter berdasarkan kondisi dan lokasi
- Edit dan hapus barang milik sendiri

### 💬 Komunikasi
- Sistem chat real-time antar pengguna
- Riwayat percakapan
- Notifikasi pesan baru

### ⭐ Review & Rating
- Sistem rating pengguna (1-5 bintang)
- Review dan feedback
- Reputasi pengguna berdasarkan rating

### 👨‍💼 Panel Admin
- Manajemen pengguna
- Moderasi barang yang diunggah
- Statistik platform

## 📁 Struktur File

```
reuse-hub/
├── app/
│   ├── Http/Controllers/     # Controller untuk logika aplikasi
│   ├── Models/              # Model database (User, Item, Review, Message)
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # File migrasi database
│   └── seeders/            # Data awal untuk testing
├── resources/
│   ├── css/                # File CSS (Tailwind)
│   ├── js/                 # File JavaScript
│   └── views/              # Template Blade
├── routes/
│   └── web.php             # Definisi routing
├── public/                 # File publik (assets, images)
├── storage/                # File upload dan cache
└── tests/                  # Unit dan feature tests
```

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP 8.2+** - Bahasa pemrograman utama
- **Laravel 12** - Framework PHP modern
- **SQLite** - Database ringan untuk development

### Frontend
- **Blade Templates** - Template engine Laravel
- **Tailwind CSS 4** - Framework CSS utility-first
- **JavaScript (Vanilla)** - Interaktivitas frontend
- **Vite** - Build tool modern

### Tools & Dependencies
- **Composer** - Package manager PHP
- **NPM** - Package manager JavaScript
- **Laravel Tinker** - REPL untuk debugging
- **PHPUnit** - Testing framework

## 🚀 Cara Instalasi & Menjalankan

### Prasyarat
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- Git

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd reuse-hub
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup database**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   php artisan db:seed
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

### Menjalankan Aplikasi

#### Development Mode
```bash
# Menjalankan semua service sekaligus
composer run dev

# Atau manual:
php artisan serve          # Server Laravel (http://localhost:8000)
npm run dev               # Vite development server
php artisan queue:work    # Background jobs
```

#### Production Mode
```bash
composer run setup        # Setup lengkap untuk production
php artisan serve --host=0.0.0.0 --port=8000
```

## 👤 Akun Default

Setelah menjalankan seeder, tersedia akun:

**Admin:**
- Email: admin@reusehub.com
- Password: admin123

**User Demo:**
- Email: user@example.com  
- Password: password

## 🧪 Testing

```bash
composer run test         # Menjalankan semua test
php artisan test         # Test dengan output detail
```

## 📱 Penggunaan

1. **Registrasi/Login** - Buat akun atau masuk dengan akun existing
2. **Lengkapi Profil** - Upload avatar dan isi informasi kontak
3. **Upload Barang** - Tambahkan barang yang ingin dibagikan/ditukar
4. **Jelajahi Barang** - Cari barang yang dibutuhkan dengan filter
5. **Chat & Negosiasi** - Hubungi pemilik barang melalui chat
6. **Bertemu & Tukar** - Koordinasi pertemuan untuk pertukaran
7. **Berikan Review** - Rating dan feedback setelah transaksi

## 🤝 Kontribusi

1. Fork repository ini
2. Buat branch fitur (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambah fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## 📞 Kontak & Support

Untuk pertanyaan atau dukungan, silakan buat issue di repository ini atau hubungi tim pengembang.

---

**Reuse Hub** - *Berbagi untuk Bumi yang Lebih Baik* 🌱