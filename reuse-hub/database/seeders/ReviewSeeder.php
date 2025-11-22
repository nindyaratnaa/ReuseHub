<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::where('email', 'admin@reusehub.com')->first();
        
        if (!$admin) {
            $admin = \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@reusehub.com',
                'password' => bcrypt('admin123'),
                'is_admin' => true
            ]);
        }

        $users = \App\Models\User::where('id', '!=', $admin->id)->take(5)->get();
        
        if ($users->isEmpty()) {
            for ($i = 1; $i <= 5; $i++) {
                $users->push(\App\Models\User::create([
                    'name' => 'User ' . $i,
                    'email' => 'user' . $i . '@test.com',
                    'password' => bcrypt('password')
                ]));
            }
        }

        $reviews = [
            ['rating' => 5, 'komentar' => 'Sangat puas dengan pertukaran barang! Admin sangat ramah dan responsif. Barang yang diberikan sesuai dengan deskripsi dan kondisinya sangat baik.'],
            ['rating' => 5, 'komentar' => 'Pengalaman tukar barang yang luar biasa! Admin orangnya sangat terpercaya dan komunikatif. Terima kasih banyak!'],
            ['rating' => 4, 'komentar' => 'Admin sangat profesional dalam bertransaksi. Barang yang ditukar sesuai ekspektasi. Overall, pengalaman yang baik.'],
            ['rating' => 5, 'komentar' => 'Pertama kali tukar barang di ReuseHub dan langsung dapat pengalaman yang menyenangkan! Admin sangat membantu dan sabar menjelaskan kondisi barang.'],
            ['rating' => 5, 'komentar' => 'Proses pertukaran sangat mudah dan cepat. Admin responsif dan barang sesuai deskripsi. Highly recommended!']
        ];

        foreach ($users as $index => $user) {
            if (isset($reviews[$index])) {
                \App\Models\Review::create([
                    'user_id' => $admin->id,
                    'reviewer_id' => $user->id,
                    'rating' => $reviews[$index]['rating'],
                    'komentar' => $reviews[$index]['komentar']
                ]);
            }
        }
    }
}
