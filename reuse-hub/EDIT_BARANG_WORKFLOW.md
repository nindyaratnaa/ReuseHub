# Alur Kerja Halaman Edit Barang - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari halaman edit barang yang memungkinkan user mengubah data item yang sudah ada.

**File Controller:** `app/Http/Controllers/ItemController.php`
**File View:** `resources/views/edit-barang.blade.php`

---

## 1. Method `edit($id)` - Load Halaman Edit

### Alur Kerja:
```
Route /barang/{id}/edit → ItemController@edit → Model Item → View edit-barang.blade.php
```

### Detail Alur:

#### 1.1 Route:
**File:** `routes/web.php` (Baris 37)
```php
Route::get('/barang/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
```
- **Middleware:** `auth` (harus login)
- **Method:** GET
- **Parameter:** `{id}` - ID item yang akan diedit
- **Name:** `items.edit`

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 91-96)
```php
public function edit($id)
{
    $item = Item::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();
    return view('edit-barang', compact('item'));
}
```

**Penjelasan Kode:**

**Baris 93-95:** Authorization Check
```php
$item = Item::where('id', $id)
    ->where('user_id', Auth::id())
    ->firstOrFail();
```
- `where('id', $id)` → Cari item berdasarkan ID
- `where('user_id', Auth::id())` → Pastikan item milik user yang login (authorization)
- `firstOrFail()` → Ambil record pertama atau throw 404 jika tidak ada

**Baris 96:** Return View
```php
return view('edit-barang', compact('item'));
```
- Return view dengan data item untuk pre-fill form

#### 1.3 View Target:
**File:** `resources/views/edit-barang.blade.php`
- Form dengan field yang sudah terisi data existing
- Preview foto existing
- JavaScript untuk update data

---

## 2. Method `update($id)` - Update Item

### Alur Kerja:
```
AJAX PUT /barang/{id} → ItemController@update → Validation → Storage → Database → JSON Response
```

### Detail Alur:

#### 2.1 Route:
**File:** `routes/web.php` (Baris 38)
```php
Route::put('/barang/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
```

#### 2.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 98-135)
```php
public function update(Request $request, $id)
{
    $item = Item::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $validator = Validator::make($request->all(), [
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'required|string',
        'kondisi' => 'required|string',
        'lokasi' => 'required|string',
        'deskripsi' => 'required|string|min:20',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $data = [
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'kondisi' => $request->kondisi,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi
    ];

    if ($request->hasFile('foto')) {
        if ($item->foto && Storage::disk('public')->exists($item->foto)) {
            Storage::disk('public')->delete($item->foto);
        }
        $data['foto'] = $request->file('foto')->store('items', 'public');
    }

    $item->update($data);

    return response()->json([
        'success' => true,
        'message' => 'Barang berhasil diperbarui!',
        'redirect' => '/profil'
    ]);
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 100-102:** Authorization Check
```php
$item = Item::where('id', $id)
    ->where('user_id', Auth::id())
    ->firstOrFail();
```
- Sama seperti edit method, pastikan item milik user yang login

**Baris 104-111:** Validasi Input
```php
$validator = Validator::make($request->all(), [
    'nama_barang' => 'required|string|max:255',
    'kategori' => 'required|string',
    'kondisi' => 'required|string',
    'lokasi' => 'required|string',
    'deskripsi' => 'required|string|min:20',
    'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'  // Foto opsional untuk update
]);
```

**Baris 113-118:** Handle Validation Error
```php
if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'errors' => $validator->errors()
    ], 422);
}
```

**Baris 120-126:** Prepare Update Data
```php
$data = [
    'nama_barang' => $request->nama_barang,
    'kategori' => $request->kategori,
    'kondisi' => $request->kondisi,
    'lokasi' => $request->lokasi,
    'deskripsi' => $request->deskripsi
];
```

**Baris 128-133:** Handle Photo Update
```php
if ($request->hasFile('foto')) {
    if ($item->foto && Storage::disk('public')->exists($item->foto)) {
        Storage::disk('public')->delete($item->foto);  // Hapus foto lama
    }
    $data['foto'] = $request->file('foto')->store('items', 'public');  // Upload foto baru
}
```

**Baris 135:** Update Database
```php
$item->update($data);
```

**Baris 137-141:** Success Response
```php
return response()->json([
    'success' => true,
    'message' => 'Barang berhasil diperbarui!',
    'redirect' => '/profil'
]);
```

---

## 3. Frontend JavaScript Functionality

### 3.1 Image Preview:
**File:** `resources/views/edit-barang.blade.php` (JavaScript section)

```javascript
function previewFile(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
```

### 3.2 Form Submission:
```javascript
document.getElementById('editForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Add method spoofing for PUT request
    formData.append('_method', 'PUT');
    
    try {
        const response = await fetch(`/barang/{{ $item->id }}`, {
            method: 'POST',  // Laravel method spoofing menggunakan POST
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (data.success) {
            // Show success notification
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            successDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>${data.message}</span>
                </div>
            `;
            document.body.appendChild(successDiv);

            // Redirect after 1.5 seconds
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 1500);
        } else {
            alert('Gagal memperbarui barang');
        }
    } catch (error) {
        alert('Terjadi kesalahan saat memperbarui barang');
    }
});
```

---

## 4. Form Pre-filling dengan Data Existing

### 4.1 Form Structure dengan Data:
**File:** `resources/views/edit-barang.blade.php`

```blade
<form id="editForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <!-- Preview Foto Existing -->
    <img id="previewImage" src="{{ $item->foto ? asset('storage/'.$item->foto) : '/images/placeholder.jpg' }}" 
         alt="Preview" class="w-full h-full object-cover">
    
    <!-- Nama Barang dengan Value -->
    <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" required>
    
    <!-- Kategori dengan Selected Option -->
    <select name="kategori" required>
        <option value="">Pilih Kategori</option>
        <option value="Elektronik" {{ $item->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
        <option value="Buku & Majalah" {{ $item->kategori == 'Buku & Majalah' ? 'selected' : '' }}>Buku & Majalah</option>
        <!-- ... more options -->
    </select>
    
    <!-- Kondisi dengan Selected Option -->
    <select name="kondisi" required>
        <option value="">Kondisi Barang</option>
        <option value="Seperti Baru" {{ $item->kondisi == 'Seperti Baru' ? 'selected' : '' }}>Seperti Baru</option>
        <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
        <option value="Cukup" {{ $item->kondisi == 'Cukup' ? 'selected' : '' }}>Cukup</option>
    </select>
    
    <!-- Lokasi dengan Selected Option -->
    <select name="lokasi" required>
        <option value="">Pilih Lokasi</option>
        <option value="Jakarta" {{ $item->lokasi == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
        <!-- ... more options -->
    </select>
    
    <!-- Deskripsi dengan Content -->
    <textarea name="deskripsi" required>{{ $item->deskripsi }}</textarea>
</form>
```

### 4.2 JavaScript untuk Set Selected Values:
```javascript
// Set kategori value
document.getElementById('kategori').value = '{{ $item->kategori }}';

// Set kondisi value
document.getElementById('kondisi').value = '{{ $item->kondisi }}';

// Set lokasi value
document.getElementById('lokasi').value = '{{ $item->lokasi }}';
```

---

## 5. Database Operations

### 5.1 Select Query (Load Item):
```sql
SELECT * FROM items 
WHERE id = ? AND user_id = ?
LIMIT 1;
```

### 5.2 Update Query:
```sql
UPDATE items 
SET nama_barang = ?, kategori = ?, kondisi = ?, 
    lokasi = ?, deskripsi = ?, foto = ?, updated_at = NOW()
WHERE id = ? AND user_id = ?;
```

---

## 6. Flow Data Lengkap

### 6.1 Load Edit Page:
1. **Request** → GET `/barang/{id}/edit`
2. **Middleware** → Check authentication
3. **Controller** → `ItemController@edit($id)`
4. **Authorization** → Check if item belongs to logged user
5. **Database** → Query item data
6. **View** → Render `edit-barang.blade.php` dengan data item
7. **JavaScript** → Set form values, initialize preview

### 6.2 Update Item:
1. **User Action** → Modify form data, optionally change photo
2. **JavaScript** → Preview new image if selected
3. **User Action** → Click "Simpan Perubahan"
4. **JavaScript** → Prevent default, create FormData dengan method spoofing
5. **AJAX Request** → POST `/barang/{id}` dengan `_method=PUT`
6. **Controller** → `ItemController@update($id)`
7. **Authorization** → Check item ownership
8. **Validation** → Validate input data
9. **Storage** → Delete old photo, upload new photo (if provided)
10. **Database** → Update item record
11. **JSON Response** → Return success message
12. **JavaScript** → Show notification, redirect to profile

### 6.3 Error Handling:
1. **Authorization Error** → 404 if item not found or not owned by user
2. **Validation Error** → Return 422 dengan detail errors
3. **File Upload Error** → Handle dalam try-catch
4. **Network Error** → Show generic error message

---

## 7. Security Features

### 7.1 Authorization:
```php
$item = Item::where('id', $id)
    ->where('user_id', Auth::id())  // Pastikan item milik user yang login
    ->firstOrFail();
```

### 7.2 CSRF Protection:
```blade
@csrf
@method('PUT')
```

### 7.3 File Validation:
```php
'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'  // Max 10MB, image only
```

---

## 8. Differences dari Create Item

| Aspect | Create Item | Edit Item |
|--------|-------------|-----------|
| **Route** | GET `/unggah` | GET `/barang/{id}/edit` |
| **Authorization** | Login required | Login + ownership check |
| **Form Data** | Empty form | Pre-filled dengan existing data |
| **Photo** | Required | Optional (nullable) |
| **Method** | POST | PUT (dengan method spoofing) |
| **Redirect** | `/tukar` | `/profil` |
| **File Handling** | Upload new | Delete old + upload new |

---

## 9. Request/Response Format

### 9.1 Update Request:
```
POST /barang/{id}
Content-Type: multipart/form-data

_method: "PUT"
_token: "csrf_token"
nama_barang: "iPhone 12 Pro (Updated)"
kategori: "Elektronik"
kondisi: "Baik"
lokasi: "Jakarta Selatan"
deskripsi: "Updated description..."
foto: [binary file data] (optional)
```

### 9.2 Success Response:
```json
{
    "success": true,
    "message": "Barang berhasil diperbarui!",
    "redirect": "/profil"
}
```

### 9.3 Validation Error Response:
```json
{
    "success": false,
    "errors": {
        "nama_barang": ["Nama barang wajib diisi"],
        "deskripsi": ["Deskripsi minimal 20 karakter"]
    }
}
```

---

## 10. File Structure

```
app/
├── Http/Controllers/
│   └── ItemController.php           ← Controller dengan edit() dan update() methods
├── Models/
│   └── Item.php                     ← Model Item
resources/views/
└── edit-barang.blade.php           ← View form edit
routes/
└── web.php                          ← Routes untuk edit dan update
storage/app/public/items/            ← Storage untuk foto items
```

---

## 11. Navigation Flow

```
Profil Page → Click "Edit" pada item → Edit Form → Submit → Back to Profil
     ↑                                      ↓
     └──────── Success Redirect ←───────────┘
```

Workflow ini menunjukkan bagaimana user dapat mengedit item mereka dengan authorization yang proper, validasi yang ketat, dan handling file upload yang aman.