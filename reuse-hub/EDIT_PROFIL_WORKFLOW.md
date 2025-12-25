# Alur Kerja Edit Profil User - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari fitur edit profil user yang terintegrasi dalam halaman profil dengan toggle edit mode.

**File Controller:** `app/Http/Controllers/ProfileController.php`
**File View:** `resources/views/profil.blade.php` (dengan JavaScript toggle)

---

## 1. Method `update()` - Update Profil User

### Alur Kerja:
```
AJAX POST /profil/update → ProfileController@update → Validation → Storage → Database → JSON Response
```

### Detail Alur:

#### 1.1 Route:
**File:** `routes/web.php` (Baris 23)
```php
Route::post('/profil/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
```
- **Middleware:** `auth` (harus login)
- **Method:** POST
- **Name:** `profile.update`

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/ProfileController.php` (Baris 10-33)
```php
public function update(Request $request)
{
    $user = auth()->user();  // Ambil user yang sedang login
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'bio' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('avatar')) {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    $user->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Profil berhasil diperbarui!',
        'user' => $user
    ]);
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 12:** `$user = auth()->user();`
- Ambil instance User yang sedang login dari session
- Tidak perlu authorization check karena user hanya bisa edit profil sendiri

**Baris 14-20:** Validasi Input
```php
$validated = $request->validate([
    'name' => 'required|string|max:255',        // Nama wajib, string, max 255 karakter
    'phone' => 'nullable|string|max:20',        // Phone opsional, max 20 karakter
    'address' => 'nullable|string',             // Alamat opsional
    'bio' => 'nullable|string',                 // Bio opsional
    'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'  // Avatar opsional, max 2MB
]);
```

**Baris 22-27:** Handle Avatar Upload
```php
if ($request->hasFile('avatar')) {
    if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
        Storage::disk('public')->delete($user->avatar);  // Hapus avatar lama
    }
    $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
}
```
- Cek apakah ada file avatar yang diupload
- Hapus avatar lama jika ada untuk menghemat storage
- Upload avatar baru ke `storage/app/public/avatars/`

**Baris 29:** `$user->update($validated);`
- Update record user dengan data yang sudah divalidasi
- Laravel akan otomatis update `updated_at` timestamp

**Baris 31-35:** JSON Response
```php
return response()->json([
    'success' => true,
    'message' => 'Profil berhasil diperbarui!',
    'user' => $user  // Return updated user data
]);
```

---

## 2. Frontend Edit Mode Toggle

### 2.1 Edit Mode State Management:
**File:** `resources/views/profil.blade.php` (JavaScript section)

```javascript
let isEditing = false;
let originalData = {};

function toggleEdit() {
    isEditing = !isEditing;
    const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
    const editBtn = document.getElementById('editBtn');
    const saveButtons = document.getElementById('saveButtons');

    if (isEditing) {
        // Store original data untuk cancel functionality
        inputs.forEach(input => {
            originalData[input.id] = input.value;
        });

        // Enable inputs (kecuali email yang tidak bisa diedit)
        inputs.forEach(input => {
            if (input.id !== 'email') {
                input.disabled = false;
                input.classList.remove('disabled:bg-gray-50');
            }
        });

        // Change button appearance
        editBtn.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span>Batal</span>
        `;
        editBtn.className = 'border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg transition flex items-center gap-2';
        
        // Show save buttons
        saveButtons.style.display = 'flex';
    } else {
        cancelEdit();
    }
}
```

### 2.2 Cancel Edit Function:
```javascript
function cancelEdit() {
    isEditing = false;
    const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
    const editBtn = document.getElementById('editBtn');
    const saveButtons = document.getElementById('saveButtons');

    // Restore original data
    inputs.forEach(input => {
        if (originalData[input.id]) {
            input.value = originalData[input.id];
        }
        input.disabled = true;
        input.classList.add('disabled:bg-gray-50');
    });

    // Reset button appearance
    editBtn.innerHTML = `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        <span>Edit Profil</span>
    `;
    editBtn.className = 'bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2';
    
    // Hide save buttons
    saveButtons.style.display = 'none';
}
```

### 2.3 Save Profile Function:
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

            // Auto remove notification and reload page
            setTimeout(() => {
                successDiv.remove();
                location.reload();
            }, 2000);
        }
    } catch (error) {
        alert('Terjadi kesalahan saat menyimpan profil');
    }

    // Reset form state
    const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
    inputs.forEach(input => {
        input.disabled = true;
        input.classList.add('disabled:bg-gray-50');
    });

    isEditing = false;
    // Reset button dan hide save buttons
    // ... (sama seperti cancelEdit)
}
```

---

## 3. Avatar Upload Functionality

### 3.1 Avatar Preview:
```javascript
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        // Validate file size (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            alert('File terlalu besar. Maksimal 2MB.');
            event.target.value = '';
            return;
        }

        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
```

### 3.2 Avatar Upload Trigger:
```html
<!-- Hidden file input -->
<input type="file" id="fileInput" accept="image/*" class="hidden" onchange="previewImage(event)">

<!-- Upload button -->
<button onclick="document.getElementById('fileInput').click()" 
        class="absolute bottom-0 right-0 bg-green-600 hover:bg-green-700 text-white p-2 rounded-full transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
    </svg>
</button>
```

---

## 4. Form Structure dan Data Binding

### 4.1 Profile Form HTML:
**File:** `resources/views/profil.blade.php`

```blade
<form id="profileForm">
    <!-- Avatar Display -->
    <img id="profileImage" 
         src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&size=150&background=10b981&color=fff' }}" 
         alt="Profile">

    <!-- Name Field -->
    <input type="text" id="fullName" name="name" value="{{ $user->name }}" disabled
           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">

    <!-- Email Field (Read-only) -->
    <input type="email" id="email" value="{{ $user->email }}" disabled
           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">

    <!-- Phone Field -->
    <input type="tel" id="phone" name="phone" value="{{ $user->phone ?? '' }}" disabled
           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">

    <!-- Address Field -->
    <textarea id="address" name="address" rows="3" disabled
              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">{{ $user->address ?? '' }}</textarea>

    <!-- Bio Field -->
    <textarea id="bio" name="bio" rows="3" disabled
              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">{{ $user->bio ?? '' }}</textarea>

    <!-- Save Buttons (Hidden by default) -->
    <div id="saveButtons" class="flex gap-3 mt-6" style="display: none;">
        <button type="button" onclick="saveProfile()" 
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
            Simpan Perubahan
        </button>
        <button type="button" onclick="cancelEdit()" 
                class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-2 rounded-lg transition">
            Batal
        </button>
    </div>
</form>
```

---

## 5. Database Operations

### 5.1 Update Query:
```sql
UPDATE users 
SET name = ?, phone = ?, address = ?, bio = ?, avatar = ?, updated_at = NOW()
WHERE id = ?;
```

### 5.2 Model yang Digunakan:
**File:** `app/Models/User.php`
```php
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 
        'phone', 'address', 'bio', 'is_admin'
    ];

    // Accessor untuk avatar URL
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&size=150&background=10b981&color=fff';
    }
}
```

---

## 6. Flow Data Lengkap

### 6.1 Enable Edit Mode:
1. **User Action** → Click "Edit Profil" button
2. **JavaScript** → `toggleEdit()` function
3. **State Change** → `isEditing = true`
4. **UI Update** → Enable form inputs, show save buttons, change button text
5. **Data Backup** → Store original values untuk cancel functionality

### 6.2 Save Changes:
1. **User Action** → Modify form data, optionally select new avatar
2. **JavaScript** → Preview new avatar if selected
3. **User Action** → Click "Simpan Perubahan"
4. **JavaScript** → `saveProfile()` function
5. **Data Collection** → Create FormData dengan semua field
6. **AJAX Request** → POST `/profil/update` dengan multipart data
7. **Controller** → `ProfileController@update()`
8. **Validation** → Validate input data
9. **Storage** → Delete old avatar, upload new avatar (if provided)
10. **Database** → Update user record
11. **JSON Response** → Return success message
12. **JavaScript** → Show notification, reload page

### 6.3 Cancel Edit:
1. **User Action** → Click "Batal" button
2. **JavaScript** → `cancelEdit()` function
3. **Data Restore** → Restore original form values
4. **UI Reset** → Disable inputs, hide save buttons, reset button text
5. **State Change** → `isEditing = false`

---

## 7. Validation Rules

| Field | Rules | Description |
|-------|-------|-------------|
| `name` | `required\|string\|max:255` | Nama wajib, maksimal 255 karakter |
| `phone` | `nullable\|string\|max:20` | Phone opsional, maksimal 20 karakter |
| `address` | `nullable\|string` | Alamat opsional |
| `bio` | `nullable\|string` | Bio opsional |
| `avatar` | `nullable\|image\|mimes:jpeg,png,jpg\|max:2048` | Avatar opsional, gambar, max 2MB |

---

## 8. File Storage Structure

```
storage/app/public/
└── avatars/
    ├── abc123def456.jpg          ← User avatars
    ├── xyz789uvw012.png
    └── ...

public/storage/                   ← Symlink ke storage/app/public/
└── avatars/
    ├── abc123def456.jpg          ← Accessible via web
    └── ...
```

---

## 9. Request/Response Format

### 9.1 Update Request:
```
POST /profil/update
Content-Type: multipart/form-data

name: "John Doe"
phone: "08123456789"
address: "Jakarta Selatan"
bio: "Suka berbagi barang bekas"
avatar: [binary file data] (optional)
```

### 9.2 Success Response:
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
        "avatar": "avatars/xyz.jpg",
        "updated_at": "2024-01-01T12:00:00.000000Z"
    }
}
```

### 9.3 Validation Error Response:
```json
{
    "message": "The given data was invalid.",
    "errors": {
        "name": ["Nama wajib diisi"],
        "avatar": ["File harus berupa gambar"]
    }
}
```

---

## 10. Security Considerations

1. **Authentication** → Route dilindungi middleware `auth`
2. **CSRF Protection** → AJAX request menggunakan CSRF token
3. **File Validation** → Validasi tipe file dan ukuran
4. **Input Sanitization** → Laravel validation rules
5. **Storage Security** → File disimpan di storage yang aman
6. **Email Protection** → Email field tidak bisa diedit (read-only)

---

## 11. UX Features

1. **Inline Editing** → Edit langsung di halaman profil tanpa redirect
2. **Real-time Preview** → Preview avatar baru sebelum save
3. **Cancel Functionality** → Restore original data jika cancel
4. **Loading States** → Button disabled saat proses save
5. **Success Notification** → Toast notification dengan auto-hide
6. **Auto Reload** → Refresh page setelah save untuk update data

File ini menunjukkan implementasi edit profil yang user-friendly dengan toggle edit mode, real-time preview, dan handling yang aman untuk file upload.