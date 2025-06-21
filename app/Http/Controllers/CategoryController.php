<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Cache::remember("category_{$id}", 300, function () use ($id) {
            return Category::findOrFail($id);
        });

        $articles = Cache::remember("category_articles_{$id}", 300, function () use ($category) {
            return $category->articles()
                ->with(['author', 'category'])
                ->orderBy('published_at', 'desc')
                ->paginate(10);
        });

        $allCategories = Cache::remember('all_categories', 300, function () {
            return Category::all();
        });

        return view('category.show', compact('category', 'articles', 'allCategories'));
    }
}
