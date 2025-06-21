<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Author::factory()->count(5)->create();

        // Buat 6 kategori
        $categories = Category::factory()->count(6)->create();

        // Buat 15 artikel, secara acak dari author dan category yang sudah dibuat
        Article::factory()->count(15)->create();
    }
}
