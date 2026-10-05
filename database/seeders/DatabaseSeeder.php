<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 5 kategori terlebih dahulu
        Category::factory(5)->create();

        // Buat 25 buku dengan kategori acak
        Book::factory(25)->create();
    }
}
