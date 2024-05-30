<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BookLoan;
use Illuminate\Support\Str;
use App\Models\BookCategory;
use App\Models\BookDonation;
use App\Models\BookProposal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@example.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
            'nim' => 'I0321084'
        ]);
        User::factory()->create([
            'name' => 'Alumni',
            'email' => 'alumni@example.com',
            'password' => bcrypt('password'),
            'role' => 'alumni',
            'nim' => 'I0317084'
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Dosen',
            'email' => 'dosen@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
            'nidn' => '1234567890',
            'nip' => '3189632967247'
        ]);

        $categories = ['Fantasi', 'Sains', 'Biografi', 'Psikologi', 'Teknologi', 'Manga', 'Komedi', 'Kamus', 'Gaya Hidup', 'Olahraga', 'Bahasa dan Sastra', 'Romansa', 'Politik', 'Horor/Thriller', 'Misteri', 'Agama', 'Bisnis', 'Karya Tulis'];

        foreach ($categories as $category) {
            BookCategory::create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }

        Book::factory(10)->create();

        BookProposal::factory(50)->create();
        // BookProposal::factory(10)->create();
        // BookDonation::factory(3)->create();
        BookDonation::factory()->create([
            'user_id' => 1,
            'book_id' => 1,
            'jumlah' => 3
        ]);
        BookDonation::factory()->create([
            'user_id' => 2,
            'book_id' => 3,
            'jumlah' => 4
        ]);
        BookDonation::factory()->create([
            'user_id' => 2,
            'book_id' => 4,
            'jumlah' => 2
        ]);

        BookLoan::factory(5)->create();

        BookDonation::factory(50)->create();
    }
}
