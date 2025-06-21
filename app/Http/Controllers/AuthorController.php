<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class AuthorController extends Controller
{
    public function show($id)
    {
        $author = Cache::remember("author_{$id}", 300, function () use ($id) {
            return Author::findOrFail($id);
        });

        $latestArticles = Cache::remember("author_latest_articles_{$id}", 300, function () use ($author) {
            return $author->articles()
                ->orderBy('published_at', 'desc')
                ->with('category')
                ->take(3)
                ->get();
        });

        $otherArticles = Cache::remember("author_other_articles_{$id}", 300, function () use ($author) {
            return $author->articles()
                ->orderBy('published_at', 'desc')
                ->with('category')
                ->skip(3)
                ->take(100)
                ->get();
        });

        $categories = Cache::remember('all_categories_for_author', 300, function () {
            return Category::all();
        });

        return view('author.show', compact('author', 'latestArticles', 'otherArticles', 'categories'));
    }
}
