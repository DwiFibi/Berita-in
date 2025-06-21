<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel terbaru (homepage).
     */
    public function index()
    {
        $articles = Cache::remember('articles_latest_home', 300, function () {
            return Article::orderBy('published_at', 'desc')
                ->take(5)
                ->get();
        });

        return view('articles.index', compact('articles'));
    }

    /**
     * Menampilkan detail artikel berdasarkan id.
     */
    public function show($id)
    {
        $article = Cache::remember("article_detail_{$id}", 300, function () use ($id) {
            return Article::with(['author', 'category'])->findOrFail($id);
        });

        $comments = Cache::remember("comments_article_{$id}", 300, function () use ($article) {
            return $article->comments()
                ->whereNull('parent_id')
                ->with(['children.author', 'author'])
                ->latest()
                ->get();
        });

        $commentCount = Cache::remember("comment_count_{$id}", 300, function () use ($article) {
            return Comment::where('article_id', $article->id)->count();
        });

        $trendingArticles = Cache::remember('trending_articles_sidebar', 300, function () {
            return Article::orderBy('published_at', 'desc')
                ->take(5)
                ->get();
        });

        $breakingNews = Cache::remember('breaking_news_sidebar', 300, function () {
            return Article::orderBy('published_at', 'desc')
                ->take(10)
                ->get();
        });

        $categories = Cache::remember('article_random_categories', 300, function () {
            return Category::inRandomOrder()->take(3)->get();
        });

        $articlesByCategory = [];

        foreach ($categories as $category) {
            $articlesByCategory[$category->id] = Cache::remember("articles_by_category_{$category->id}", 300, function () use ($category) {
                return Article::with(['author', 'category'])
                    ->where('category_id', $category->id)
                    ->orderBy('published_at', 'desc')
                    ->take(3)
                    ->get();
            });
        }

        return view('articles.singlepost', compact(
            'article',
            'trendingArticles',
            'breakingNews',
            'comments',
            'categories',
            'articlesByCategory',
            'commentCount'
        ));
    }

    /**
     * Menampilkan daftar artikel trending.
     */
    public function trending()
    {
        $articles = Cache::remember('articles_trending_page', 300, function () {
            return Article::orderByDesc('views')->paginate(15);
        });

        return view('articles.trending', compact('articles'));
    }

    /**
     * Menampilkan daftar artikel unggulan (featured).
     */
    public function featured()
    {
        $articles = Cache::remember('articles_featured_page', 300, function () {
            return Article::where('is_featured', true)
                ->orderByDesc('published_at')
                ->paginate(15);
        });

        return view('articles.featured', compact('articles'));
    }

    /**
     * Menampilkan daftar artikel terbaru.
     */
    public function latest()
    {
        $articles = Cache::remember('articles_latest_page', 300, function () {
            return Article::orderByDesc('published_at')->paginate(15);
        });

        return view('articles.latest', compact('articles'));
    }
}
