# Alur Kerja AdminController - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari AdminController yang mengelola halaman admin untuk users dan items.

**File Controller:** `app/Http/Controllers/AdminController.php`

---

## 1. Method `users()` - Halaman Daftar Users

### Alur Kerja:
```
Route → AdminController@users → Model User → View admin.users
```

### Detail Alur:

#### 1.1 Route (Kemungkinan di `routes/web.php`):
```php
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
```

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/AdminController.php` (Baris 10-14)
```php
public function users()
{
    $users = User::latest()->get();           // Ambil semua user, urutkan terbaru
    return view('admin.users', compact('users')); // Kirim ke view
}
```

**Penjelasan Kode:**
- `User::latest()` → Query builder untuk mengambil data user diurutkan berdasarkan created_at DESC
- `->get()` → Eksekusi query dan ambil semua hasil
- `compact('users')` → Membuat array ['users' => $users] untuk dikirim ke view
- `view('admin.users')` → Load file view `resources/views/admin/users.blade.php`

#### 1.3 Model yang Digunakan:
**File:** `app/Models/User.php`
- Menggunakan Eloquent ORM
- Method `latest()` adalah scope bawaan Laravel

#### 1.4 View Target:
**File:** `resources/views/admin/users.blade.php`
- Menerima variable `$users` berisi collection User objects

---

## 2. Method `items()` - Halaman Daftar Items

### Alur Kerja:
```
Route → AdminController@items → Model Item (with User relation) → View admin.items
```

### Detail Alur:

#### 2.1 Route (Kemungkinan di `routes/web.php`):
```php
Route::get('/admin/items', [AdminController::class, 'items'])->name('admin.items');
```

#### 2.2 Controller Method:
**File:** `app/Http/Controllers/AdminController.php` (Baris 16-20)
```php
public function items()
{
    $items = Item::with('user')->latest()->paginate(10);  // Ambil items dengan relasi user, pagination 10
    return view('admin.items', compact('items'));         // Kirim ke view
}
```

**Penjelasan Kode:**
- `Item::with('user')` → Eager loading relasi user untuk menghindari N+1 query problem
- `->latest()` → Urutkan berdasarkan created_at DESC
- `->paginate(10)` → Bagi hasil menjadi halaman dengan 10 item per halaman
- Return LengthAwarePaginator object, bukan Collection biasa

#### 2.3 Model yang Digunakan:
**File:** `app/Models/Item.php`
- Harus memiliki relasi `user()` method:
```php
public function user()
{
    return $this->belongsTo(User::class);
}
```

#### 2.4 View Target:
**File:** `resources/views/admin/items.blade.php`
- Menerima variable `$items` berisi LengthAwarePaginator object
- Bisa akses `$items->links()` untuk pagination links

---

## 3. Method `deleteItem($id)` - Hapus Item

### Alur Kerja:
```
Route (DELETE/POST) → AdminController@deleteItem → Model Item → Storage → Redirect
```

### Detail Alur:

#### 3.1 Route (Kemungkinan di `routes/web.php`):
```php
Route::delete('/admin/items/{id}', [AdminController::class, 'deleteItem'])->name('admin.items.delete');
// atau
Route::post('/admin/items/{id}/delete', [AdminController::class, 'deleteItem'])->name('admin.items.delete');
```

#### 3.2 Controller Method:
**File:** `app/Http/Controllers/AdminController.php` (Baris 22-33)
```php
public function deleteItem($id)
{
    $item = Item::findOrFail($id);  // Cari item atau throw 404
    
    // Hapus file foto jika ada
    if ($item->foto && Storage::disk('public')->exists($item->foto)) {
        Storage::disk('public')->delete($item->foto);
    }
    
    $item->delete();  // Hapus record dari database
    
    return redirect()->route('admin.items')->with('success', 'Barang berhasil dihapus');
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 24:** `$item = Item::findOrFail($id);`
- Cari item berdasarkan ID
- Jika tidak ditemukan, otomatis throw ModelNotFoundException (HTTP 404)

**Baris 26:** `if ($item->foto && Storage::disk('public')->exists($item->foto))`
- Cek apakah item memiliki foto (field foto tidak null/empty)
- Cek apakah file foto benar-benar ada di storage/app/public/

**Baris 27:** `Storage::disk('public')->delete($item->foto);`
- Hapus file foto dari storage/app/public/
- Menggunakan Laravel Storage facade

**Baris 30:** `$item->delete();`
- Hapus record item dari database
- Trigger Eloquent events (deleting, deleted)

**Baris 32:** `return redirect()->route('admin.items')->with('success', '...');`
- Redirect ke halaman admin.items
- Bawa flash message 'success' ke session

#### 3.3 Dependencies yang Digunakan:
- `Illuminate\Support\Facades\Storage` → Untuk operasi file
- `App\Models\Item` → Model Eloquent

#### 3.4 Storage Configuration:
**File:** `config/filesystems.php`
- Disk 'public' mengarah ke `storage/app/public`
- Biasanya di-symlink ke `public/storage`

---

## 4. Dependencies dan Imports

**File:** `app/Http/Controllers/AdminController.php` (Baris 3-7)
```php
use App\Models\User;                    // Model User
use App\Models\Item;                    // Model Item  
use Illuminate\Http\Request;            // HTTP Request (tidak digunakan di methods ini)
use Illuminate\Support\Facades\Storage; // Storage facade untuk file operations
```

---

## 5. Struktur File yang Terlibat

```
app/
├── Http/Controllers/
│   └── AdminController.php          ← Controller utama
├── Models/
│   ├── User.php                     ← Model User
│   └── Item.php                     ← Model Item (harus ada relasi user())
resources/views/admin/
├── users.blade.php                  ← View daftar users
└── items.blade.php                  ← View daftar items
routes/
└── web.php                          ← Route definitions
storage/app/public/                  ← Storage untuk foto items
```

---

## 6. Flow Data Lengkap

### Users Page:
1. **Request** → Route `/admin/users`
2. **Controller** → `AdminController@users()`
3. **Database Query** → `SELECT * FROM users ORDER BY created_at DESC`
4. **Response** → View dengan data users

### Items Page:
1. **Request** → Route `/admin/items`
2. **Controller** → `AdminController@items()`
3. **Database Query** → `SELECT * FROM items LEFT JOIN users ON items.user_id = users.id ORDER BY items.created_at DESC LIMIT 10`
4. **Response** → View dengan data items + pagination

### Delete Item:
1. **Request** → Route `/admin/items/{id}` (DELETE/POST)
2. **Controller** → `AdminController@deleteItem($id)`
3. **Database Query** → `SELECT * FROM items WHERE id = ?`
4. **File Operation** → Delete foto dari storage jika ada
5. **Database Query** → `DELETE FROM items WHERE id = ?`
6. **Response** → Redirect ke `/admin/items` dengan flash message