# Alur Kerja Halaman Tukar - ReuseHub

## Overview
File ini menjelaskan alur kerja lengkap dari halaman tukar barang yang menampilkan daftar item dengan fitur filter, search, dan pagination.

**File Controller:** `app/Http/Controllers/ItemController.php`
**File View:** `resources/views/tukar.blade.php`

---

## 1. Method `index()` - Halaman Utama Tukar Barang

### Alur Kerja:
```
Route /tukar → ItemController@index → Model Item (with User relation) → View tukar.blade.php
```

### Detail Alur:

#### 1.1 Route:
**File:** `routes/web.php` (Baris 33)
```php
Route::get('/tukar', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
```
- **Middleware:** `auth` (harus login)
- **Method:** GET
- **Name:** `items.index`

#### 1.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 12-49)
```php
public function index(Request $request)
{
    $query = Item::with('user')->latest();  // Base query dengan eager loading

    // Filter kategori
    if ($request->filled('kategori')) {
        $query->whereIn('kategori', $request->kategori);
    }

    // Filter lokasi  
    if ($request->filled('lokasi')) {
        $query->where('lokasi', $request->lokasi);
    }

    // Filter kondisi
    if ($request->filled('kondisi')) {
        $query->where('kondisi', $request->kondisi);
    }

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_barang', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }

    $items = $query->paginate(12);  // Pagination 12 item per halaman

    // AJAX Response untuk filter dinamis
    if ($request->ajax()) {
        return response()->json([
            'items' => $items->items(),
            'total' => $items->total(),
            'current_page' => $items->currentPage(),
            'last_page' => $items->lastPage()
        ]);
    }

    return view('tukar', compact('items'));  // Return view dengan data
}
```

**Penjelasan Kode Baris per Baris:**

**Baris 14:** `$query = Item::with('user')->latest();`
- Membuat query builder untuk model Item
- `with('user')` → Eager loading relasi user untuk menghindari N+1 query
- `latest()` → Urutkan berdasarkan created_at DESC

**Baris 16-19:** Filter Kategori
```php
if ($request->filled('kategori')) {
    $query->whereIn('kategori', $request->kategori);
}
```
- Cek apakah parameter `kategori` ada dan tidak kosong
- `whereIn()` → SQL: `WHERE kategori IN ('Elektronik', 'Buku', ...)`
- Mendukung multiple kategori dari checkbox

**Baris 21-24:** Filter Lokasi
```php
if ($request->filled('lokasi')) {
    $query->where('lokasi', $request->lokasi);
}
```
- Filter berdasarkan lokasi tunggal
- SQL: `WHERE lokasi = 'Jakarta'`

**Baris 26-29:** Filter Kondisi
```php
if ($request->filled('kondisi')) {
    $query->where('kondisi', $request->kondisi);
}
```
- Filter berdasarkan kondisi barang
- SQL: `WHERE kondisi = 'Seperti Baru'`

**Baris 31-38:** Search Functionality
```php
if ($request->filled('search')) {
    $search = $request->search;
    $query->where(function($q) use ($search) {
        $q->where('nama_barang', 'like', "%{$search}%")
          ->orWhere('deskripsi', 'like', "%{$search}%");
    });
}
```
- Search di field `nama_barang` dan `deskripsi`
- Menggunakan closure untuk grouping OR conditions
- SQL: `WHERE (nama_barang LIKE '%search%' OR deskripsi LIKE '%search%')`

**Baris 40:** `$items = $query->paginate(12);`
- Eksekusi query dengan pagination
- 12 item per halaman
- Return LengthAwarePaginator object

**Baris 42-49:** AJAX Response
```php
if ($request->ajax()) {
    return response()->json([
        'items' => $items->items(),
        'total' => $items->total(), 
        'current_page' => $items->currentPage(),
        'last_page' => $items->lastPage()
    ]);
}
```
- Untuk request AJAX (filter dinamis via JavaScript)
- Return JSON dengan data pagination

**Baris 51:** `return view('tukar', compact('items'));`
- Return view normal dengan data items

#### 1.3 Model yang Digunakan:
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
        return $this->belongsTo(User::class);  // Relasi ke User
    }
}
```

#### 1.4 View Target:
**File:** `resources/views/tukar.blade.php`
- Menerima variable `$items` (LengthAwarePaginator)
- Menampilkan filter sidebar dan grid produk
- JavaScript untuk filter dinamis

---

## 2. Method `show($id)` - Detail Item

### Alur Kerja:
```
Route /tukardetail/{id} → ItemController@show → Model Item → View tukardetail.blade.php
```

### Detail Alur:

#### 2.1 Route:
**File:** `routes/web.php` (Baris 34)
```php
Route::get('/tukardetail/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
```

#### 2.2 Controller Method:
**File:** `app/Http/Controllers/ItemController.php` (Baris 51-55)
```php
public function show($id)
{
    $item = Item::with('user')->findOrFail($id);  // Cari item dengan user data
    return view('tukardetail', compact('item'));   // Return detail view
}
```

**Penjelasan:**
- `findOrFail($id)` → Cari berdasarkan ID, throw 404 jika tidak ada
- `with('user')` → Load data user pemilik item
- Return view detail dengan data item

#### 2.3 View Target:
**File:** `resources/views/tukardetail.blade.php`
- Menampilkan detail lengkap item
- Informasi pemilik barang
- Tombol kontak/chat

---

## 3. Frontend JavaScript Functionality

### 3.1 Filter Dinamis:
**File:** `resources/views/tukar.blade.php` (JavaScript section)

```javascript
// Data items dari backend
let items = @json($items->items());

// Filter elements
const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
const filterRadios = document.querySelectorAll('.filter-radio');
const filterSelect = document.getElementById('lokasiFilter');
const searchInput = document.getElementById('mainSearch');
```

### 3.2 Event Listeners:
```javascript
// Checkbox kategori change
filterCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', applyFilters);
});

// Radio kondisi change  
filterRadios.forEach(radio => {
    radio.addEventListener('change', applyFilters);
});

// Select lokasi change
filterSelect.addEventListener('change', applyFilters);

// Search input
searchInput.addEventListener('input', debounce(applyFilters, 300));
```

### 3.3 AJAX Filter Function:
```javascript
function applyFilters() {
    const formData = new FormData();
    
    // Collect kategori
    const selectedKategori = [];
    filterCheckboxes.forEach(cb => {
        if (cb.checked) selectedKategori.push(cb.value);
    });
    
    // Collect kondisi
    const selectedKondisi = document.querySelector('input[name="kondisi"]:checked')?.value;
    
    // Collect lokasi
    const selectedLokasi = filterSelect.value;
    
    // Collect search
    const searchTerm = searchInput.value;
    
    // Build query parameters
    const params = new URLSearchParams();
    if (selectedKategori.length) params.append('kategori[]', selectedKategori);
    if (selectedKondisi) params.append('kondisi', selectedKondisi);
    if (selectedLokasi) params.append('lokasi', selectedLokasi);
    if (searchTerm) params.append('search', searchTerm);
    
    // AJAX request
    fetch(`/tukar?${params.toString()}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        updateProductGrid(data.items);
        updatePagination(data);
        updateResultCount(data.items.length, data.total);
    });
}
```

---

## 4. Database Queries yang Terjadi

### 4.1 Query Dasar (tanpa filter):
```sql
SELECT items.*, users.name, users.email 
FROM items 
LEFT JOIN users ON items.user_id = users.id 
ORDER BY items.created_at DESC 
LIMIT 12 OFFSET 0;
```

### 4.2 Query dengan Filter Kategori:
```sql
SELECT items.*, users.name, users.email 
FROM items 
LEFT JOIN users ON items.user_id = users.id 
WHERE items.kategori IN ('Elektronik', 'Buku & Majalah')
ORDER BY items.created_at DESC 
LIMIT 12 OFFSET 0;
```

### 4.3 Query dengan Search:
```sql
SELECT items.*, users.name, users.email 
FROM items 
LEFT JOIN users ON items.user_id = users.id 
WHERE (items.nama_barang LIKE '%laptop%' OR items.deskripsi LIKE '%laptop%')
ORDER BY items.created_at DESC 
LIMIT 12 OFFSET 0;
```

### 4.4 Query Count untuk Pagination:
```sql
SELECT COUNT(*) FROM items 
WHERE [conditions...]
```

---

## 5. Flow Data Lengkap

### 5.1 Initial Page Load:
1. **Request** → GET `/tukar`
2. **Middleware** → Check authentication
3. **Controller** → `ItemController@index()`
4. **Database** → Query items dengan pagination
5. **View** → Render `tukar.blade.php` dengan data
6. **JavaScript** → Initialize filter functionality

### 5.2 Filter/Search (AJAX):
1. **User Action** → Change filter/type search
2. **JavaScript** → Collect filter values
3. **AJAX Request** → GET `/tukar?kategori[]=Elektronik&search=laptop`
4. **Controller** → Same `index()` method dengan parameters
5. **Database** → Query dengan WHERE conditions
6. **JSON Response** → Return filtered data
7. **JavaScript** → Update DOM dengan hasil baru

### 5.3 View Detail:
1. **User Click** → Item card
2. **Request** → GET `/tukardetail/{id}`
3. **Controller** → `ItemController@show($id)`
4. **Database** → Query single item dengan user data
5. **View** → Render `tukardetail.blade.php`

---

## 6. Dependencies dan File Structure

```
app/
├── Http/Controllers/
│   └── ItemController.php           ← Controller utama
├── Models/
│   ├── Item.php                     ← Model Item dengan relasi user()
│   └── User.php                     ← Model User
resources/views/
├── tukar.blade.php                  ← View utama halaman tukar
└── tukardetail.blade.php           ← View detail item
routes/
└── web.php                          ← Route definitions
storage/app/public/items/            ← Storage untuk foto items
```

---

## 7. Request Parameters yang Diterima

| Parameter | Type | Description | Example |
|-----------|------|-------------|---------|
| `kategori[]` | Array | Filter kategori (multiple) | `['Elektronik', 'Buku']` |
| `lokasi` | String | Filter lokasi tunggal | `'Jakarta'` |
| `kondisi` | String | Filter kondisi barang | `'Seperti Baru'` |
| `search` | String | Search term | `'laptop'` |
| `page` | Integer | Halaman pagination | `2` |

---

## 8. Response Format

### 8.1 Normal Request (HTML):
- Return view `tukar.blade.php`
- Variable `$items` berisi LengthAwarePaginator

### 8.2 AJAX Request (JSON):
```json
{
    "items": [...],           // Array of item objects
    "total": 25,             // Total items found
    "current_page": 1,       // Current page number
    "last_page": 3           // Last page number
}
```