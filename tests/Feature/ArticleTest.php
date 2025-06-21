<?php

namespace Tests\Unit;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;


class ArticleTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_fetches_only_featured_articles()
    {
        // Buat 3 artikel tidak featured
        Article::factory()->count(3)->create(['is_featured' => false]);

        // Buat 2 artikel featured
        Article::factory()->count(2)->create(['is_featured' => true]);

        // Ambil artikel featured dari database
        $featuredArticles = Article::where('is_featured', true)->get();

        // Pastikan jumlahnya sesuai harapan
        $this->assertCount(2, $featuredArticles);
    }
}
