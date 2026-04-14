<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Profile
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sastrain.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // User Profile
        User::create([
            'name' => 'Siswa Example',
            'email' => 'siswa@sastrain.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'student_id' => '12345678',
        ]);

        // Setup Categories
        $fiksi = Category::create(['name' => 'Fiksi', 'slug' => 'fiksi']);
        $edukasi = Category::create(['name' => 'Edukasi', 'slug' => 'edukasi']);

        // Setup Books
        Book::create([
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'isbn' => '978-979-3062-79-2',
            'published_year' => 2005,
            'stock' => 5,
            'category_id' => $fiksi->id,
            'description' => 'Kisah anak-anak Belitong.',
        ]);

        Book::create([
            'title' => 'Rekayasa Perangkat Lunak',
            'author' => 'Rosa A.S',
            'publisher' => 'Informatika',
            'isbn' => '978-602-6232-47-5',
            'published_year' => 2018,
            'stock' => 3,
            'category_id' => $edukasi->id,
            'description' => 'Buku pedoman jurusan RPL.',
        ]);
    }
}
