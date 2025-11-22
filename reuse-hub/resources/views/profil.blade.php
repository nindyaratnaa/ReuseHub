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
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img id="profileImage" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&size=150&background=10b981&color=fff' }}" 
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
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                        <p class="text-gray-600 mb-4">Bergabung sejak {{ $user->created_at->format('F Y') }}</p>
                        
                        <!-- Account Status -->
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <div class="text-sm text-gray-600">
                                <span class="font-medium">47 Pertukaran</span> • 
                                <a href="/review" class="font-medium text-green-600 hover:text-green-700 transition">
                                    4.9 ⭐ Rating
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
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
                                    <input type="text" id="fullName" name="name" value="{{ $user->name }}" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" value="{{ $user->email }}" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Handphone</label>
                                    <input type="tel" id="phone" name="phone" value="{{ $user->phone ?? '' }}" disabled
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                    <textarea id="address" name="address" rows="3" disabled
                                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">{{ $user->address ?? '' }}</textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea id="bio" name="bio" rows="3" disabled
                                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-50">{{ $user->bio ?? '' }}</textarea>
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

            // Enable inputs except email
            inputs.forEach(input => {
                if (input.id !== 'email') {
                    input.disabled = false;
                    input.classList.remove('disabled:bg-gray-50');
                }
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

    async function saveProfile() {
        const formData = new FormData();
        formData.append('name', document.getElementById('fullName').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('bio', document.getElementById('bio').value);
        
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
                    successDiv.remove();
                    location.reload();
                }, 2000);
            }
        } catch (error) {
            alert('Terjadi kesalahan saat menyimpan profil');
        }

        const inputs = document.querySelectorAll('#profileForm input, #profileForm select, #profileForm textarea');
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