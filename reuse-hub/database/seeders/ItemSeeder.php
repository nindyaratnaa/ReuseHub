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
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Novel Harry Potter Set',
                'kategori' => 'Buku & Majalah',
                'kondisi' => 'Baik',
                'lokasi' => 'Bandung',
                'deskripsi' => 'Koleksi lengkap 7 buku Harry Potter dalam bahasa Indonesia. Kondisi masih bagus.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Jaket Denim Vintage',
                'kategori' => 'Pakaian',
                'kondisi' => 'Baik',
                'lokasi' => 'Yogyakarta',
                'deskripsi' => 'Jaket denim vintage ukuran M dengan warna biru klasik.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Kursi Gaming',
                'kategori' => 'Perabot',
                'kondisi' => 'Cukup',
                'lokasi' => 'Surabaya',
                'deskripsi' => 'Kursi gaming ergonomis, masih nyaman dipakai.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'LEGO Architecture Set',
                'kategori' => 'Mainan',
                'kondisi' => 'Seperti Baru',
                'lokasi' => 'Jakarta Pusat',
                'deskripsi' => 'Set LEGO lengkap dengan manual, kondisi prima.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Sepeda Lipat Polygon',
                'kategori' => 'Olahraga',
                'kondisi' => 'Seperti Baru',
                'lokasi' => 'Medan',
                'deskripsi' => 'Sepeda lipat 20 inch, jarang dipakai, mulus.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Laptop Asus ROG',
                'kategori' => 'Elektronik',
                'kondisi' => 'Baik',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Laptop gaming Asus ROG, spek tinggi, kondisi terawat.',
                'foto' => 'items/default.jpg'
            ],
            [
                'nama_barang' => 'Meja Belajar Kayu',
                'kategori' => 'Perabot',
                'kondisi' => 'Baik',
                'lokasi' => 'Semarang',
                'deskripsi' => 'Meja belajar kayu solid, kokoh dan awet.',
                'foto' => 'items/default.jpg'
            ]
        ];

        foreach ($items as $item) {
            Item::create(array_merge($item, ['user_id' => $user->id]));
        }
    }
}
