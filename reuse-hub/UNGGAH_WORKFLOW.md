# Alur Kerja Halaman Unggah Barang - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari halaman unggah barang yang memungkinkan user menambahkan item baru untuk ditukar.

**File Controller:** `app/Http/Controllers/ItemController.php`
**File View:** `resources/views/unggah.blade.php`

---

## 1. Method `create()` - Load Halaman Unggah

### Alur Kerja:
```
Route /unggah → ItemController@create → View unggah.blade.php
```

### Detail Alur:

#### 1.1 Route:
**File:** `routes/web.php` (Baris 35)
```php
Route::get('/unggah', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
```
- **Middleware:** `auth` (harus login)
- **Method:** GET
- **Name:** `items.create`

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 56-59)
```php
public function create()
{
    return view('unggah');  // Return view form unggah
}
```

**Penjelasan:**
- Method sederhana yang hanya return view
- Tidak ada data yang dikirim ke view
- View berisi form kosong untuk input data

#### 1.3 View Target:
**File:** `resources/views/unggah.blade.php`
- Form dengan field: foto, nama_barang, kategori, kondisi, lokasi, deskripsi
- JavaScript untuk upload gambar, validasi, dan submit AJAX

---

## 2. Method `store()` - Simpan Item Baru

### Alur Kerja:
```
AJAX POST /unggah → ItemController@store → Validation → Storage → Database → JSON Response
```

### Detail Alur:

#### 2.1 Route:
**File:** `routes/web.php` (Baris 36)
```php
Route::post('/unggah', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
```

#### 2.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 61-89)
```php
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string',
        'kondisi' => 'required|string',
        'lokasi' => 'required|string',
        'deskripsi' => 'required|string|min:20',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:10240'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $fotoPath = $request->file('foto')->store('items', 'public');

    Item::create([
        'user_id' => Auth::id(),
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'kondisi' => $request->kondisi,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'foto' => $fotoPath
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Barang berhasil diunggah!',
        'redirect' => '/tukar'
    ]);
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 63-70:** Validasi Input
```php
$validator = Validator::make($request->all(), [
    'nama_barang' => 'required|string|max:255',     // Wajib, string, max 255 karakter
    'kategori' => 'required|string',                // Wajib, string
    'kondisi' => 'required|string',                 // Wajib, string
    'lokasi' => 'required|string',                  // Wajib, string
    'deskripsi' => 'required|string|min:20',        // Wajib, string, min 20 karakter
    'foto' => 'required|image|mimes:jpeg,png,jpg|max:10240'  // Wajib, gambar, max 10MB
]);
```

**Baris 72-77:** Handle Validation Error
```php
if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'errors' => $validator->errors()
    ], 422);
}
```
- Return JSON dengan status 422 (Unprocessable Entity)
- Berisi detail error untuk setiap field

**Baris 79:** Upload File
```php
$fotoPath = $request->file('foto')->store('items', 'public');
```
- Upload file ke `storage/app/public/items/`
- Return path relatif file (contoh: `items/abc123.jpg`)

**Baris 81-89:** Simpan ke Database
```php
Item::create([
    'user_id' => Auth::id(),                // ID user yang login
    'nama_barang' => $request->nama_barang,
    'kategori' => $request->kategori,
    'kondisi' => $request->kondisi,
    'lokasi' => $request->lokasi,
    'deskripsi' => $request->deskripsi,
    'foto' => $fotoPath                     // Path file yang sudah diupload
]);
```

**Baris 91-95:** Success Response
```php
return response()->json([
    'success' => true,
    'message' => 'Barang berhasil diunggah!',
    'redirect' => '/tukar'                  // Redirect ke halaman tukar
]);
```

---

## 3. Frontend JavaScript Functionality

### 3.1 Image Upload Handling:
**File:** `resources/views/unggah.blade.php` (JavaScript section)

```javascript
const uploadArea = document.getElementById('uploadArea');
const imageUpload = document.getElementById('imageUpload');
const imagePreview = document.getElementById('imagePreview');

// Click to upload
uploadArea.addEventListener('click', () => imageUpload.click());

// File input change
imageUpload.addEventListener('change', handleImageUpload);

function handleImageUpload(e) {
    const file = e.target.files[0];
    if (file) {
        // Validasi ukuran file
        if (file.size > 10 * 1024 * 1024) {
            alert('File terlalu besar. Maksimal 10MB.');
            return;
        }
        displayImagePreview(file);
    }
}

function displayImagePreview(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        imagePreview.innerHTML = `
            <div class="relative col-span-2">
                <img src="${e.target.result}" class="w-full h-40 object-cover rounded-lg border">
            </div>
        `;
        imagePreview.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}
```

### 3.2 Drag & Drop Functionality:
```javascript
// Drag over
uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('border-green-500', 'bg-green-50');
});

// Drag leave
uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('border-green-500', 'bg-green-50');
});

// Drop
uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('border-green-500', 'bg-green-50');
    const files = Array.from(e.dataTransfer.files);
    handleFiles(files);
});
```

### 3.3 Character Counter:
```javascript
const deskripsi = document.getElementById('deskripsi');
const charCount = document.getElementById('charCount');

deskripsi.addEventListener('input', function() {
    const length = this.value.length;
    charCount.textContent = length;

    // Limit to 500 characters
    if (length > 500) {
        this.value = this.value.substring(0, 500);
        charCount.textContent = 500;
    }
});
```

### 3.4 Form Submission:
```javascript
const form = document.getElementById('uploadForm');

form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');

    // Disable button dan ubah text
    submitBtn.disabled = true;
    submitBtn.textContent = 'Mengunggah...';

    try {
        const response = await fetch('/unggah', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        // Handle validation errors
        if (!response.ok) {
            let errorMessage = '';
            for (let key in data.errors) {
                errorMessage += `${data.errors[key][0]}\n`;
            }
            alert(errorMessage);
            return;
        }

        // Handle success
        if (data.success) {
            alert(data.message);
            window.location.href = data.redirect;
        }

    } catch (error) {
        alert('Gagal mengunggah. Coba lagi.');
    } finally {
        // Re-enable button
        submitBtn.disabled = false;
        submitBtn.textContent = 'Unggah Barang';
    }
});
```

---

## 4. Form Fields dan Validasi

### 4.1 Form Structure:
**File:** `resources/views/unggah.blade.php`

```html
<form id="uploadForm" method="POST" action="/unggah" enctype="multipart/form-data">
    @csrf
    
    <!-- Upload Gambar -->
    <input type="file" name="foto" accept="image/*" required>
    
    <!-- Nama Barang -->
    <input type="text" name="nama_barang" required>
    
    <!-- Kategori -->
    <select name="kategori" required>
        <option value="">Pilih Kategori</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Buku & Majalah">Buku & Majalah</option>
        <option value="Pakaian">Pakaian</option>
        <option value="Perabot">Perabot</option>
        <option value="Mainan">Mainan</option>
        <option value="Olahraga">Olahraga</option>
    </select>
    
    <!-- Kondisi (Radio Buttons) -->
    <input type="radio" name="kondisi" value="Seperti Baru" required>
    <input type="radio" name="kondisi" value="Baik">
    <input type="radio" name="kondisi" value="Cukup">
    
    <!-- Lokasi -->
    <select name="lokasi" required>
        <option value="">Pilih Lokasi</option>
        <option value="Jakarta">Jakarta</option>
        <option value="Jakarta Selatan">Jakarta Selatan</option>
        <!-- ... more options -->
    </select>
    
    <!-- Deskripsi -->
    <textarea name="deskripsi" rows="8" required></textarea>
</form>
```

### 4.2 Validation Rules:

| Field | Rules | Description |
|-------|-------|-------------|
| `nama_barang` | `required\|string\|max:255` | Wajib, string, maksimal 255 karakter |
| `kategori` | `required\|string` | Wajib, harus pilih dari dropdown |
| `kondisi` | `required\|string` | Wajib, pilih salah satu radio button |
| `lokasi` | `required\|string` | Wajib, harus pilih dari dropdown |
| `deskripsi` | `required\|string\|min:20` | Wajib, minimal 20 karakter |
| `foto` | `required\|image\|mimes:jpeg,png,jpg\|max:10240` | Wajib, gambar, format JPG/PNG, max 10MB |

---

## 5. Database Operations

### 5.1 Insert Query:
```sql
INSERT INTO items (
    user_id, nama_barang, kategori, kondisi, 
    lokasi, deskripsi, foto, created_at, updated_at
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()
);
```

### 5.2 Model yang Digunakan:
**File:** `app/Models/Item.php`
```php
class Item extends Model
{
    protected $fillable = [
        'user_id', 'foto', 'nama_barang', 'kategori',
        'kondisi', 'lokasi', 'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

---

## 6. Flow Data Lengkap

### 6.1 Initial Page Load:
1. **Request** → GET `/unggah`
2. **Middleware** → Check authentication
3. **Controller** → `ItemController@create()`
4. **View** → Render `unggah.blade.php` (form kosong)
5. **JavaScript** → Initialize upload functionality

### 6.2 Form Submission:
1. **User Action** → Fill form dan pilih foto
2. **JavaScript** → Preview image, validate file size
3. **User Action** → Click "Unggah Barang"
4. **JavaScript** → Prevent default, create FormData
5. **AJAX Request** → POST `/unggah` dengan multipart data
6. **Controller** → `ItemController@store()`
7. **Validation** → Validate all input fields
8. **File Upload** → Save foto ke `storage/app/public/items/`
9. **Database** → Insert record ke table items
10. **JSON Response** → Return success message
11. **JavaScript** → Show alert, redirect ke `/tukar`

### 6.3 Error Handling:
1. **Validation Error** → Return 422 dengan detail errors
2. **JavaScript** → Parse errors, show alert dengan pesan error
3. **File Size Error** → JavaScript validation, show alert
4. **Network Error** → Catch exception, show generic error

---

## 7. File Storage Structure

```
storage/app/public/
└── items/
    ├── abc123def456.jpg          ← Uploaded item photos
    ├── xyz789uvw012.png
    └── ...

public/storage/                   ← Symlink ke storage/app/public/
└── items/
    ├── abc123def456.jpg          ← Accessible via web
    └── ...
```

**Storage Configuration:**
- Disk: `public` (config/filesystems.php)
- Path: `storage/app/public/items/`
- URL: `http://domain.com/storage/items/filename.jpg`

---

## 8. Request/Response Format

### 8.1 Form Submission Request:
```
POST /unggah
Content-Type: multipart/form-data

nama_barang: "iPhone 12 Pro"
kategori: "Elektronik"
kondisi: "Seperti Baru"
lokasi: "Jakarta"
deskripsi: "iPhone 12 Pro warna biru, kondisi sangat baik..."
foto: [binary file data]
```

### 8.2 Success Response:
```json
{
    "success": true,
    "message": "Barang berhasil diunggah!",
    "redirect": "/tukar"
}
```

### 8.3 Validation Error Response:
```json
{
    "success": false,
    "errors": {
        "nama_barang": ["Nama barang wajib diisi"],
        "foto": ["File foto wajib diupload"],
        "deskripsi": ["Deskripsi minimal 20 karakter"]
    }
}
```

---

## 9. Dependencies dan File Structure

```
app/
├── Http/Controllers/
│   └── ItemController.php           ← Controller untuk CRUD items
├── Models/
│   ├── Item.php                     ← Model Item
│   └── User.php                     ← Model User (untuk relasi)
resources/views/
└── unggah.blade.php                 ← View form unggah
routes/
└── web.php                          ← Route definitions
storage/app/public/items/            ← Storage untuk foto items
```

---

## 10. Security Considerations

1. **CSRF Protection** → Form menggunakan `@csrf` token
2. **File Validation** → Validasi tipe file (image only) dan ukuran (max 10MB)
3. **Authentication** → Route dilindungi middleware `auth`
4. **Input Sanitization** → Laravel validation rules
5. **File Storage** → File disimpan di storage yang aman, tidak di public folder langsung