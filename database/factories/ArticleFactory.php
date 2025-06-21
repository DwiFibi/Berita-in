<?php

// database/factories/ArticleFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $titles = [
            'Inovasi AI dalam Kehidupan Sehari-hari',
            'Timnas Indonesia Lolos ke Final',
            'Film Baru Marvel Tembus Box Office',
            'Ekonomi Indonesia Tumbuh Positif',
            'Tips Menjaga Kesehatan Mental',
            'Strategi Belajar Efektif untuk Mahasiswa'
        ];

        $title = collect($titles)->random();

        return [
            'title' => $title,
            'content' => 'Ini adalah konten artikel: ' . $title,
            'image_path' => 'images/articles/' . Str::slug($title) . '.jpg',
            'author_id' => Author::inRandomOrder()->first()?->id ?? Author::factory(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'status' => 'publish',
            'uploaded_at' => now()->subDays(rand(0, 10)),
            'is_latest' => rand(0, 1),
            'is_popular' => rand(0, 1),
            'is_featured' => rand(0, 1),
            'is_newest' => rand(0, 1),
            'is_highlight' => rand(0, 1),
            'published_at' => now(),
        ];
    }
}
