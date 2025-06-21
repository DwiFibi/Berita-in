<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

class ArticleFeaturedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_featured_articles_in_featured_page()
    {
        // Bersihkan cache agar tidak konflik
        Cache::flush();

        // Arrange: Buat 3 artikel unggulan dan 2 bukan unggulan
        $featured = Article::factory()->count(3)->create(['is_featured' => true]);
        $nonFeatured = Article::factory()->count(2)->create(['is_featured' => false]);

        // Act: Kunjungi route featured (pastikan route-nya /articles/featured atau sesuaikan)
        $response = $this->get('/articles/featured');

        // Assert: Pastikan response OK
        $response->assertStatus(200);

        // Pastikan artikel unggulan muncul di halaman
        foreach ($featured as $article) {
            $response->assertSeeText($article->title);
        }

        // Pastikan artikel bukan unggulan tidak muncul
        foreach ($nonFeatured as $article) {
            $response->assertDontSeeText($article->title);
        }
    }
}
