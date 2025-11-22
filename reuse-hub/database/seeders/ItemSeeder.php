<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@reusehub.com',
                'password' => bcrypt('admin123'),
                'is_admin' => true
            ]);
        }

        $items = [
            [
                'nama_barang' => 'iPhone 12 Pro',
                'kategori' => 'Elektronik',
                'kondisi' => 'Seperti Baru',
                'lokasi' => 'Jakarta Selatan',
                'deskripsi' => 'iPhone 12 Pro dalam kondisi sangat baik, lengkap dengan charger original dan case pelindung.',
                'foto' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Novel Harry Potter Set',
                'kategori' => 'Buku & Majalah',
                'kondisi' => 'Baik',
                'lokasi' => 'Bandung',
                'deskripsi' => 'Koleksi lengkap 7 buku Harry Potter dalam bahasa Indonesia. Kondisi masih bagus.',
                'foto' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Jaket Denim Vintage',
                'kategori' => 'Pakaian',
                'kondisi' => 'Baik',
                'lokasi' => 'Yogyakarta',
                'deskripsi' => 'Jaket denim vintage ukuran M dengan warna biru klasik.',
                'foto' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Kursi Gaming',
                'kategori' => 'Perabot',
                'kondisi' => 'Cukup',
                'lokasi' => 'Surabaya',
                'deskripsi' => 'Kursi gaming ergonomis, masih nyaman dipakai.',
                'foto' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'LEGO Architecture Set',
                'kategori' => 'Mainan',
                'kondisi' => 'Seperti Baru',
                'lokasi' => 'Jakarta Pusat',
                'deskripsi' => 'Set LEGO lengkap dengan manual, kondisi prima.',
                'foto' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Sepeda Lipat Polygon',
                'kategori' => 'Olahraga',
                'kondisi' => 'Seperti Baru',
                'lokasi' => 'Medan',
                'deskripsi' => 'Sepeda lipat 20 inch, jarang dipakai, mulus.',
                'foto' => 'https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Laptop Asus ROG',
                'kategori' => 'Elektronik',
                'kondisi' => 'Baik',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Laptop gaming Asus ROG, spek tinggi, kondisi terawat.',
                'foto' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop'
            ],
            [
                'nama_barang' => 'Meja Belajar Kayu',
                'kategori' => 'Perabot',
                'kondisi' => 'Baik',
                'lokasi' => 'Semarang',
                'deskripsi' => 'Meja belajar kayu solid, kokoh dan awet.',
                'foto' => 'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=400&h=300&fit=crop'
            ]
        ];

        foreach ($items as $item) {
            Item::create(array_merge($item, ['user_id' => $user->id]));
        }
    }
}
