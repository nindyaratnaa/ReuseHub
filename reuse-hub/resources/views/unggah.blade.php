@extends('layouts.main')

@section('title', 'Unggah Barang - ReuseHub')

@section('content')
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-green-50 to-white py-12">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Unggah Barang untuk Ditukar
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Berikan kehidupan baru pada barang Anda dengan menukarnya kepada yang membutuhkan. 
                Isi form di bawah untuk memulai.
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm p-8">
                <form id="uploadForm" class="space-y-8">
                    
                    <!-- Upload Gambar -->
                    <div>
                        <label class="block text-lg font-semibold text-gray-900 mb-4">Foto Barang</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-green-500 transition-colors">
                            <div id="uploadArea" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-gray-600 mb-2">Klik untuk unggah foto atau drag & drop</p>
                                <p class="text-sm text-gray-500">PNG, JPG hingga 10MB (Maksimal 5 foto)</p>
                            </div>
                            <input type="file" id="imageUpload" multiple accept="image/*" class="hidden">
                        </div>
                        <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-4 hidden">
                            <!-- Preview images will be shown here -->
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Kiri -->
                        <div class="space-y-6">
                            <!-- Nama Barang -->
                            <div>
                                <label for="namaBarang" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang *</label>
                                <input type="text" id="namaBarang" name="namaBarang" placeholder="Contoh: iPhone 12 Pro" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none" required>
                                <p id="namaBarangError" class="text-red-500 text-sm mt-1 hidden">Nama barang wajib diisi</p>
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                                <select id="kategori" name="kategori" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="elektronik">Elektronik</option>
                                    <option value="buku">Buku & Majalah</option>
                                    <option value="pakaian">Pakaian</option>
                                    <option value="perabot">Perabot</option>
                                    <option value="mainan">Mainan</option>
                                    <option value="olahraga">Olahraga</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                                <p id="kategoriError" class="text-red-500 text-sm mt-1 hidden">Kategori wajib dipilih</p>
                            </div>

                            <!-- Kondisi -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi Barang *</label>
                                <div class="space-y-3">
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="radio" name="kondisi" value="seperti-baru" class="text-green-600 focus:ring-green-500" required>
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900">Seperti Baru</div>
                                            <div class="text-sm text-gray-500">Tidak ada kerusakan, jarang dipakai</div>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="radio" name="kondisi" value="baik" class="text-green-600 focus:ring-green-500">
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900">Baik</div>
                                            <div class="text-sm text-gray-500">Sedikit bekas pakai, masih berfungsi normal</div>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="radio" name="kondisi" value="cukup" class="text-green-600 focus:ring-green-500">
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900">Cukup</div>
                                            <div class="text-sm text-gray-500">Ada bekas pakai, tapi masih layak</div>
                                        </div>
                                    </label>
                                </div>
                                <p id="kondisiError" class="text-red-500 text-sm mt-1 hidden">Kondisi barang wajib dipilih</p>
                            </div>
                        </div>

                        <!-- Kanan -->
                        <div class="space-y-6">
                            <!-- Lokasi -->
                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">Lokasi *</label>
                                <select id="lokasi" name="lokasi" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none" required>
                                    <option value="">Pilih Lokasi</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="bandung">Bandung</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="medan">Medan</option>
                                    <option value="yogyakarta">Yogyakarta</option>
                                    <option value="semarang">Semarang</option>
                                    <option value="makassar">Makassar</option>
                                    <option value="palembang">Palembang</option>
                                </select>
                                <p id="lokasiError" class="text-red-500 text-sm mt-1 hidden">Lokasi wajib dipilih</p>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Barang *</label>
                                <textarea id="deskripsi" name="deskripsi" rows="8" placeholder="Ceritakan kondisi barang, alasan ingin ditukar, dan hal menarik lainnya..." 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none resize-none" required></textarea>
                                <div class="flex justify-between items-center mt-1">
                                    <p id="deskripsiError" class="text-red-500 text-sm hidden">Deskripsi minimal 20 karakter</p>
                                    <p class="text-sm text-gray-500"><span id="charCount">0</span>/500 karakter</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button type="submit" 
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 002.828 2.828 4 4 0 005.656 0 4 4 0 002.828-2.828 4 4 0 000-5.656 4 4 0 00-2.828-2.828 4 4 0 00-5.656 0 4 4 0 00-2.828 2.828 4 4 0 000 5.656z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Unggah Barang
                        </button>
                        <button type="button" onclick="window.history.back()" 
                            class="sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition duration-200">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<script>
    // Image upload handling
    const uploadArea = document.getElementById('uploadArea');
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    let uploadedFiles = [];

    uploadArea.addEventListener('click', () => imageUpload.click());
    
    imageUpload.addEventListener('change', handleImageUpload);
    
    // Drag and drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-green-500', 'bg-green-50');
    });
    
    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('border-green-500', 'bg-green-50');
    });
    
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-green-500', 'bg-green-50');
        const files = Array.from(e.dataTransfer.files);
        handleFiles(files);
    });

    function handleImageUpload(e) {
        const files = Array.from(e.target.files);
        handleFiles(files);
    }

    function handleFiles(files) {
        const imageFiles = files.filter(file => file.type.startsWith('image/'));
        
        if (uploadedFiles.length + imageFiles.length > 5) {
            alert('Maksimal 5 foto yang dapat diunggah');
            return;
        }
        
        imageFiles.forEach(file => {
            if (file.size > 10 * 1024 * 1024) {
                alert(`File ${file.name} terlalu besar. Maksimal 10MB.`);
                return;
            }
            
            uploadedFiles.push(file);
            displayImagePreview(file);
        });
        
        if (uploadedFiles.length > 0) {
            imagePreview.classList.remove('hidden');
        }
    }

    function displayImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative';
            div.innerHTML = `
                <img src="${e.target.result}" class="w-full h-20 object-cover rounded-lg border">
                <button type="button" onclick="removeImage(this)" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                    ×
                </button>
            `;
            imagePreview.appendChild(div);
        };
        reader.readAsDataURL(file);
    }

    function removeImage(button) {
        const index = Array.from(imagePreview.children).indexOf(button.parentElement);
        uploadedFiles.splice(index, 1);
        button.parentElement.remove();
        
        if (uploadedFiles.length === 0) {
            imagePreview.classList.add('hidden');
        }
    }

    // Character counter
    const deskripsi = document.getElementById('deskripsi');
    const charCount = document.getElementById('charCount');
    
    deskripsi.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = length;
        
        if (length > 500) {
            this.value = this.value.substring(0, 500);
            charCount.textContent = 500;
        }
    });

    // Form validation
    const form = document.getElementById('uploadForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        // Reset errors
        document.querySelectorAll('[id$="Error"]').forEach(el => el.classList.add('hidden'));
        
        // Validate required fields
        const namaBarang = document.getElementById('namaBarang').value.trim();
        const kategori = document.getElementById('kategori').value;
        const lokasi = document.getElementById('lokasi').value;
        const deskripsiText = document.getElementById('deskripsi').value.trim();
        const kondisi = document.querySelector('input[name="kondisi"]:checked');
        
        if (!namaBarang) {
            document.getElementById('namaBarangError').classList.remove('hidden');
            isValid = false;
        }
        
        if (!kategori) {
            document.getElementById('kategoriError').classList.remove('hidden');
            isValid = false;
        }
        
        if (!lokasi) {
            document.getElementById('lokasiError').classList.remove('hidden');
            isValid = false;
        }
        
        if (!kondisi) {
            document.getElementById('kondisiError').classList.remove('hidden');
            isValid = false;
        }
        
        if (deskripsiText.length < 20) {
            document.getElementById('deskripsiError').classList.remove('hidden');
            isValid = false;
        }
        
        if (uploadedFiles.length === 0) {
            alert('Minimal 1 foto harus diunggah');
            isValid = false;
        }
        
        if (isValid) {
            alert('Barang berhasil diunggah! Anda akan diarahkan ke halaman tukar.');
            window.location.href = '/tukar';
        }
    });
</script>
@endsection