<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bagikan semua kategori ke semua view (untuk sidebar)
        View::share('allCategories', Category::all());

        // Bagikan 5 kategori saja ke semua view (untuk footer)
        View::share('footerCategories', Category::take(5)->get());
    }
}
