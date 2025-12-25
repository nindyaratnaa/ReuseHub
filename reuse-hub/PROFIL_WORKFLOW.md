# Alur Kerja Halaman Profil - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari halaman profil user yang menampilkan informasi user, form edit profil, dan daftar barang milik user.

**File Controller:** `app/Http/Controllers/PageController.php` & `app/Http/Controllers/ProfileController.php`
**File View:** `resources/views/profil.blade.php`

---

## 1. Method `profil()` - Halaman Utama Profil

### Alur Kerja:
```
Route /profil → PageController@profil → Model User & Item → View profil.blade.php
```

### Detail Alur:

#### 1.1 Route:
**File:** `routes/web.php` (Baris 22)
```php
Route::get('/profil', [PageController::class, 'profil']);
```
- **Middleware:** `auth` (harus login)
- **Method:** GET

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/PageController.php` (Baris 35-42)
```php
public function profil()
{
    $user = auth()->user();                          // Ambil user yang sedang login
    $userItems = \App\Models\Item::where('user_id', $user->id)  // Query items milik user
        ->latest()                                   // Urutkan terbaru
        ->paginate(6);                              // Pagination 6 item per halaman
    return view('profil', compact('user', 'userItems'));  // Return view dengan data
}
```

**Penjelasan Kode:**

**Baris 37:** `$user = auth()->user();`
- Mengambil data user yang sedang login dari session
- Return User model instance

**Baris 38-41:** Query User Items
```php
$userItems = \App\Models\Item::where('user_id', $user->id)
    ->latest()
    ->paginate(6);
```
- `where('user_id', $user->id)` → Filter items berdasarkan user yang login
- `latest()` → Urutkan berdasarkan created_at DESC
- `paginate(6)` → Pagination dengan 6 item per halaman

**Baris 42:** `return view('profil', compact('user', 'userItems'));`
- Return view dengan 2 variable: `$user` dan `$userItems`

#### 1.3 Model yang Digunakan:

**File:** `app/Models/User.php`
```php
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 
        'phone', 'address', 'bio', 'is_admin'
    ];

    // Accessor untuk rating rata-rata
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    // Accessor untuk total reviews
    public function getTotalReviewsAttribute()
    {
        return $this->reviews()->count();
    }

    // Relasi ke reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
}
```

#### 1.4 View Target:
**File:** `resources/views/profil.blade.php`
- Menerima variable `$user` dan `$userItems`
- Menampilkan profile header, form edit, dan grid items

---

## 2. Method `update()` - Update Profil User

### Alur Kerja:
```
AJAX POST /profil/update → ProfileController@update → Validation → Storage → Database → JSON Response
```

### Detail Alur:

#### 2.1 Route:
**File:** `routes/web.php` (Baris 23)
```php
Route::post('/profil/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
```

#### 2.2 Controller Method:
**File:** `app/Http/Controllers/ProfileController.php` (Baris 10-36)
```php
public function update(Request $request)
{
    $user = auth()->user();  // Ambil user yang login
    
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'bio' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Handle upload avatar
    if ($request->hasFile('avatar')) {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);  // Hapus avatar lama
        }
        $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    $user->update($validated);  // Update database

    return response()->json([
        'success' => true,
        'message' => 'Profil berhasil diperbarui!',
        'user' => $user
    ]);
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 12:** `$user = auth()->user();`
- Ambil user yang sedang login

**Baris 14-20:** Validasi Input
```php
$validated = $request->validate([
    'name' => 'required|string|max:255',        // Nama wajib, string, max 255 karakter
    'phone' => 'nullable|string|max:20',        // Phone opsional, max 20 karakter
    'address' => 'nullable|string',             // Alamat opsional
    'bio' => 'nullable|string',                 // Bio opsional
    'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'  // Avatar opsional, gambar, max 2MB
]);
```

**Baris 22-27:** Handle Avatar Upload
```php
if ($request->hasFile('avatar')) {
    if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
        Storage::disk('public')->delete($user->avatar);  // Hapus file lama
    }
    $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
}
```
- Cek apakah ada file avatar yang diupload
- Hapus avatar lama jika ada
- Simpan avatar baru ke `storage/app/public/avatars/`

**Baris 29:** `$user->update($validated);`
- Update record user di database dengan data yang sudah divalidasi

**Baris 31-35:** JSON Response
```php
return response()->json([
    'success' => true,
    'message' => 'Profil berhasil diperbarui!',
    'user' => $user
]);
```

---

## 3. Frontend JavaScript Functionality

### 3.1 Edit Mode Toggle:
**File:** `resources/views/profil.blade.php` (JavaScript section)

```javascript
let isEditing = false;
let originalData = {};

function toggleEdit() {
    isEditing = !isEditing;
    const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
    
    if (isEditing) {
        // Store original data untuk cancel functionality
        inputs.forEach(input => {
            originalData[input.id] = input.value;
        });
        
        // Enable inputs (kecuali email)
        inputs.forEach(input => {
            if (input.id !== 'email') {
                input.disabled = false;
            }
        });
        
        // Change button to cancel
        // Show save buttons
    } else {
        cancelEdit();
    }
}
```

### 3.2 Save Profile Function:
```javascript
async function saveProfile() {
    const formData = new FormData();
    formData.append('name', document.getElementById('fullName').value);
    formData.append('phone', document.getElementById('phone').value);
    formData.append('address', document.getElementById('address').value);
    formData.append('bio', document.getElementById('bio').value);
    
    // Handle avatar upload
    const avatarFile = document.getElementById('fileInput').files[0];
    if (avatarFile) {
        formData.append('avatar', avatarFile);
    }

    try {
        const response = await fetch('/profil/update', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (data.success) {
            // Show success message
            // Reload page after 2 seconds
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    } catch (error) {
        alert('Terjadi kesalahan saat menyimpan profil');
    }
}
```

### 3.3 Item Management Functions:
```javascript
function editItem(itemId) {
    window.location.href = `/barang/${itemId}/edit`;  // Redirect ke halaman edit
}

async function deleteItem(itemId) {
    if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
        try {
            const response = await fetch(`/barang/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (data.success) {
                // Show success message
                // Reload page
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        } catch (error) {
            alert('Terjadi kesalahan saat menghapus barang');
        }
    }
}
```

---

## 4. Database Queries yang Terjadi

### 4.1 Query Load Profil:
```sql
-- Ambil data user
SELECT * FROM users WHERE id = ?;

-- Ambil items milik user dengan pagination
SELECT * FROM items 
WHERE user_id = ? 
ORDER BY created_at DESC 
LIMIT 6 OFFSET 0;

-- Count total items untuk pagination
SELECT COUNT(*) FROM items WHERE user_id = ?;

-- Ambil reviews untuk rating (via accessor)
SELECT AVG(rating) FROM reviews WHERE user_id = ?;
SELECT COUNT(*) FROM reviews WHERE user_id = ?;
```

### 4.2 Query Update Profil:
```sql
UPDATE users 
SET name = ?, phone = ?, address = ?, bio = ?, avatar = ?, updated_at = NOW()
WHERE id = ?;
```

### 4.3 Query Delete Item:
```sql
-- Cari item milik user
SELECT * FROM items WHERE id = ? AND user_id = ?;

-- Hapus item
DELETE FROM items WHERE id = ? AND user_id = ?;
```

---

## 5. Flow Data Lengkap

### 5.1 Initial Page Load:
1. **Request** → GET `/profil`
2. **Middleware** → Check authentication
3. **Controller** → `PageController@profil()`
4. **Database Queries:**
   - Get user data
   - Get user items with pagination
   - Get user reviews for rating calculation
5. **View** → Render `profil.blade.php` dengan data user dan items
6. **JavaScript** → Initialize edit functionality

### 5.2 Edit Profile (AJAX):
1. **User Action** → Click "Edit Profil" button
2. **JavaScript** → Enable form inputs, show save buttons
3. **User Input** → Fill form data, select avatar
4. **User Action** → Click "Simpan Perubahan"
5. **JavaScript** → Collect form data, create FormData
6. **AJAX Request** → POST `/profil/update` dengan FormData
7. **Controller** → `ProfileController@update()`
8. **Validation** → Validate input data
9. **Storage** → Save avatar file (if uploaded)
10. **Database** → Update user record
11. **JSON Response** → Return success message
12. **JavaScript** → Show success notification, reload page

### 5.3 Delete Item:
1. **User Action** → Click "Hapus" button pada item
2. **JavaScript** → Show confirmation dialog
3. **User Confirm** → Click OK
4. **AJAX Request** → DELETE `/barang/{id}`
5. **Controller** → `ItemController@destroy($id)`
6. **Database** → Delete item record
7. **Storage** → Delete item photo
8. **JSON Response** → Return success message
9. **JavaScript** → Show success notification, reload page

---

## 6. View Components dan Data Binding

### 6.1 Profile Header Section:
```blade
<!-- Profile Picture -->
<img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&size=150&background=10b981&color=fff' }}" 
     alt="Profile">

<!-- User Info -->
<h1>{{ $user->name }}</h1>
<p>Bergabung sejak {{ $user->created_at->format('F Y') }}</p>

<!-- Rating Display -->
<a href="/review">
    {{ number_format($user->average_rating, 1) }} ⭐ Rating ({{ $user->total_reviews }} ulasan)
</a>
```

### 6.2 Profile Form:
```blade
<input type="text" name="name" value="{{ $user->name }}" disabled>
<input type="email" value="{{ $user->email }}" disabled>  <!-- Email tidak bisa diedit -->
<input type="tel" name="phone" value="{{ $user->phone ?? '' }}" disabled>
<textarea name="address" disabled>{{ $user->address ?? '' }}</textarea>
<textarea name="bio" disabled>{{ $user->bio ?? '' }}</textarea>
```

### 6.3 User Items Grid:
```blade
@if(isset($userItems) && $userItems->count() > 0)
    @foreach($userItems as $item)
        <div class="item-card">
            <img src="{{ $item->foto ? asset('storage/'.$item->foto) : '/images/placeholder.jpg' }}">
            <h3>{{ $item->nama_barang }}</h3>
            <p>{{ Str::limit($item->deskripsi, 80) }}</p>
            <span>{{ $item->kategori }}</span>
            <span>{{ ucfirst($item->kondisi) }}</span>
            <span>📍 {{ $item->lokasi }}</span>
            
            <button onclick="editItem({{ $item->id }})">Edit</button>
            <button onclick="deleteItem({{ $item->id }})">Hapus</button>
        </div>
    @endforeach
    
    <!-- Pagination -->
    {{ $userItems->links() }}
@else
    <!-- Empty state -->
@endif
```

---

## 7. File Structure dan Dependencies

```
app/
├── Http/Controllers/
│   ├── PageController.php           ← Controller untuk load profil
│   ├── ProfileController.php        ← Controller untuk update profil
│   └── ItemController.php           ← Controller untuk CRUD items
├── Models/
│   ├── User.php                     ← Model User dengan accessors
│   ├── Item.php                     ← Model Item
│   └── Review.php                   ← Model Review untuk rating
resources/views/
└── profil.blade.php                 ← View utama profil
routes/
└── web.php                          ← Route definitions
storage/app/public/
├── avatars/                         ← Storage untuk avatar users
└── items/                           ← Storage untuk foto items
```

---

## 8. Request/Response Format

### 8.1 Profile Update Request:
```
POST /profil/update
Content-Type: multipart/form-data

name: "John Doe"
phone: "08123456789"
address: "Jakarta Selatan"
bio: "Suka berbagi barang bekas"
avatar: [file]
```

### 8.2 Profile Update Response:
```json
{
    "success": true,
    "message": "Profil berhasil diperbarui!",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "08123456789",
        "address": "Jakarta Selatan",
        "bio": "Suka berbagi barang bekas",
        "avatar": "avatars/xyz.jpg"
    }
}
```

### 8.3 Delete Item Response:
```json
{
    "success": true,
    "message": "Barang berhasil dihapus!"
}
```