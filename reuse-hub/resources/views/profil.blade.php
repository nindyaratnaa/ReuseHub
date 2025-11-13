@extends('layouts.main')

@section('title', 'Profil Akun - ReuseHub')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="flex items-center gap-2 text-sm text-gray-600">
                <a href="/beranda" class="hover:text-green-600 transition">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">Profil Akun</span>
            </nav>
        </div>
    </section>

    <!-- Profile Container -->
    <section class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-6">
            
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img id="profileImage" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" 
                                 alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <button onclick="document.getElementById('fileInput').click()" 
                                class="absolute bottom-0 right-0 bg-green-600 hover:bg-green-700 text-white p-2 rounded-full transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </button>
                        <input type="file" id="fileInput" accept="image/*" class="hidden" onchange="previewImage(event)">
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Sari Dewi</h1>
                        <p class="text-gray-600 mb-4">Bergabung sejak Januari 2024</p>
                        
                        <!-- Account Status -->
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-full flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-semibold">Eco Champion</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <span class="font-medium">47 Pertukaran</span> • 
                                <span class="font-medium">4.9 ⭐</span> Rating
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">
                
                <!-- Profile Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900">Informasi Profil</h2>
                            <button id="editBtn" onclick="toggleEdit()" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span id="editBtnText">Edit Profil</span>
                            </button>
                        </div>

                        <form id="profileForm">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" id="fullName" value="Sari Dewi" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                    <select id="gender" disabled
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                        <option value="perempuan" selected>Perempuan</option>
                                        <option value="laki-laki">Laki-laki</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" value="sari.dewi@email.com" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Handphone</label>
                                    <input type="tel" id="phone" value="+62 812-3456-7890" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                    <textarea id="address" rows="3" disabled
                                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">Jl. Sudirman No. 123, Jakarta Selatan, DKI Jakarta 12190</textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea id="bio" rows="3" disabled
                                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">Seorang ibu rumah tangga yang peduli lingkungan. Suka menukar barang untuk mengurangi limbah dan membantu sesama. Mari bersama-sama menjaga bumi!</textarea>
                                </div>
                            </div>

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
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    
                    <!-- Account Level -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Level Akun</h3>
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-green-600 text-lg">Eco Champion</h4>
                            <p class="text-sm text-gray-600 mb-4">Level 3 dari 5</p>
                            
                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            
                            <div class="text-xs text-gray-600 space-y-1">
                                <p>47/50 Pertukaran untuk level berikutnya</p>
                                <p class="font-medium text-green-600">3 pertukaran lagi menuju Eco Master!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Total Pertukaran</span>
                                <span class="font-semibold text-gray-900">47</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Rating</span>
                                <span class="font-semibold text-gray-900">4.9 ⭐</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Barang Aktif</span>
                                <span class="font-semibold text-gray-900">8</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Dampak CO₂</span>
                                <span class="font-semibold text-green-600">-125 kg</span>
                            </div>
                        </div>
                    </div>

                    <!-- Achievements -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Pencapaian</h3>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="text-center p-3 bg-yellow-50 rounded-lg">
                                <div class="text-2xl mb-1">🏆</div>
                                <p class="text-xs text-gray-600">First Trade</p>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl mb-1">🌱</div>
                                <p class="text-xs text-gray-600">Eco Warrior</p>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-2xl mb-1">⭐</div>
                                <p class="text-xs text-gray-600">5 Star Trader</p>
                            </div>
                            <div class="text-center p-3 bg-purple-50 rounded-lg">
                                <div class="text-2xl mb-1">📚</div>
                                <p class="text-xs text-gray-600">Book Lover</p>
                            </div>
                            <div class="text-center p-3 bg-red-50 rounded-lg">
                                <div class="text-2xl mb-1">👕</div>
                                <p class="text-xs text-gray-600">Fashion Forward</p>
                            </div>
                            <div class="text-center p-3 bg-gray-100 rounded-lg opacity-50">
                                <div class="text-2xl mb-1">🔒</div>
                                <p class="text-xs text-gray-600">Locked</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    let isEditing = false;
    let originalData = {};

    function toggleEdit() {
        isEditing = !isEditing;
        const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
        const editBtn = document.getElementById('editBtn');
        const editBtnText = document.getElementById('editBtnText');
        const saveButtons = document.getElementById('saveButtons');

        if (isEditing) {
            // Store original data
            inputs.forEach(input => {
                originalData[input.id] = input.value;
            });

            // Enable inputs
            inputs.forEach(input => {
                input.disabled = false;
                input.classList.remove('disabled:bg-gray-50');
            });

            editBtn.innerHTML = `
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span>Batal</span>
            `;
            editBtn.className = 'border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg transition flex items-center gap-2';
            saveButtons.style.display = 'flex';
        } else {
            cancelEdit();
        }
    }

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

        editBtn.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <span>Edit Profil</span>
        `;
        editBtn.className = 'bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2';
        saveButtons.style.display = 'none';
    }

    function saveProfile() {
        // Simulate saving
        const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
        
        // Show success message
        const successDiv = document.createElement('div');
        successDiv.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50';
        successDiv.innerHTML = `
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>Profil berhasil diperbarui!</span>
            </div>
        `;
        document.body.appendChild(successDiv);

        setTimeout(() => {
            successDiv.remove();
        }, 3000);

        // Disable inputs
        inputs.forEach(input => {
            input.disabled = true;
            input.classList.add('disabled:bg-gray-50');
        });

        isEditing = false;
        const editBtn = document.getElementById('editBtn');
        const saveButtons = document.getElementById('saveButtons');

        editBtn.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <span>Edit Profil</span>
        `;
        editBtn.className = 'bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2';
        saveButtons.style.display = 'none';
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection