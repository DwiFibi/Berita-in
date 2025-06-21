<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        if (!is_null($q)) {
            $breakingNews = Cache::remember('search_breaking_news', 300, function () {
                return Article::with(['category', 'author'])
                    ->where('is_newest', true)
                    ->orderBy('published_at', 'desc')
                    ->take(5)
                    ->get();
            });

            $articles = Article::with(['category', 'author'])
                ->where(function ($query) use ($q) {
                    $query->where('title', 'LIKE', "%{$q}%")
                        ->orWhere('content', 'LIKE', "%{$q}%")
                        ->orWhereHas('category', function ($subquery) use ($q) {
                            $subquery->where('name', 'LIKE', "%{$q}%");
                        });
                })
                ->orderBy('published_at', 'desc')
                ->get();

            $allCategories = Cache::remember('all_categories_for_search', 300, function () {
                return Category::all();
            });

            return view('search', compact('articles', 'breakingNews', 'allCategories'));
        }

        // Landing page
        $breakingNews = Cache::remember('landing_breaking_news', 300, function () {
            return Article::with(['category', 'author'])
                ->where('is_newest', true)
                ->orderBy('published_at', 'desc')
                ->take(5)
                ->get();
        });

        $trendingArticles = Cache::remember('landing_trending_articles', 300, function () {
            return Article::with(['category', 'author'])
                ->where('is_popular', true)
                ->orderBy('published_at', 'desc')
                ->take(5)
                ->get();
        });

        $categories = Cache::remember('landing_random_categories', 300, function () {
            return Category::inRandomOrder()->take(3)->get();
        });

        $mainArticle = Cache::remember('landing_main_featured_article', 300, function () {
            return Article::with(['category', 'author'])
                ->where('is_featured', true)
                ->orderBy('published_at', 'desc')
                ->first();
        });

        $featuredArticles = Cache::remember('landing_featured_articles', 300, function () {
            return Article::with(['category', 'author'])
                ->where('is_featured', true)
                ->orderBy('published_at', 'desc')
                ->take(7)
                ->get();
        });

        $allCategories = Cache::remember('all_categories', 300, function () {
            return Category::all();
        });

        $articlesByCategory = [];

        foreach ($categories as $category) {
            $articlesByCategory[$category->id] = Cache::remember("landing_articles_category_{$category->id}", 300, function () use ($category) {
                return Article::with(['author', 'category'])
                    ->where('category_id', $category->id)
                    ->orderBy('published_at', 'desc')
                    ->take(3)
                    ->get();
            });
        }

        $latestArticles = Cache::remember('landing_latest_articles', 300, function () {
            return Article::with(['category', 'author'])
                ->orderBy('published_at', 'desc')
                ->take(7)
                ->get();
        });

        $authors = Cache::remember('landing_authors', 300, function () {
            return Author::all();
        });

        $subscribeAd = Cache::remember('landing_subscribe_ad', 300, function () {
            return Ad::where('position', 'subscribe')
                ->where('is_active', true)
                ->latest()
                ->first();
        });

        return view('landing', compact(
            'breakingNews',
            'trendingArticles',
            'mainArticle',
            'categories',
            'allCategories',
            'articlesByCategory',
            'authors',
            'featuredArticles',
            'latestArticles',
            'subscribeAd'
        ));
    }
}
