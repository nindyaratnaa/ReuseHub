@extends('layouts.main')

@section('title', 'Edit Barang - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/beranda" class="hover:text-green-600 transition">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="/profil" class="hover:text-green-600 transition">Profil</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Edit Barang</span>
            </nav>
        </div>
    </section>

    <!-- Edit Form -->
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Barang</h1>

                <form id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Foto Barang -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Barang</label>
                            <div class="flex items-center gap-4">
                                <div class="w-32 h-32 bg-gray-100 rounded-lg overflow-hidden">
                                    <img id="previewImage" src="{{ $item->foto ? asset('storage/'.$item->foto) : '/images/placeholder.jpg' }}" 
                                         alt="Preview" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <input type="file" id="foto" name="foto" accept="image/*" class="hidden" onchange="previewFile(event)">
                                    <button type="button" onclick="document.getElementById('foto').click()" 
                                            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
                                        Ganti Foto
                                    </button>
                                    <p class="text-sm text-gray-500 mt-2">Format: JPG, PNG (Max: 10MB)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang *</label>
                            <input type="text" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}" required
                                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select id="kategori" name="kategori" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih Kategori</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Buku & Majalah">Buku & Majalah</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Perabot">Perabot</option>
                                <option value="Mainan">Mainan</option>
                                <option value="Olahraga">Olahraga</option>
                            </select>
                        </div>

                        <!-- Kondisi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi *</label>
                            <select id="kondisi" name="kondisi" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Kondisi Barang</option>
                                <option value="Buku & Majalah">Seperti Baru</option>
                                <option value="Pakaian">Baik</option>
                                <option value="Pakaian">Cukup</option>
                            </select>
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi *</label>
                            <select id="lokasi" name="lokasi"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Medan">Medan</option>
                                <option value="Yogyakarta">Yogyakarta</option>
                                <option value="Semarang">Semarang</option>
                            </select>
                            <p id="lokasiError" class="text-red-500 text-sm mt-1 hidden">Lokasi wajib dipilih</p>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" required
                                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                      placeholder="Jelaskan kondisi barang, alasan menjual, dll. (minimal 20 karakter)">{{ $item->deskripsi }}</textarea>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 mt-6">
                        <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                        <a href="/profil" 
                           class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

<script>
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

    document.getElementById('editForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        // Add method spoofing for PUT
        formData.append('_method', 'PUT');
        
        try {
            const response = await fetch(`/barang/{{ $item->id }}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (data.success) {
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
</script>

@endsection