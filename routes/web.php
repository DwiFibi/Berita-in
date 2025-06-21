    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ArticleController;
    use App\Http\Controllers\CategoryController;
    use Filament\Http\Controllers\Auth\LogoutController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\AuthorController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\SubscribeController;





    // Halaman landing (homepage)
    Route::get('/', [HomeController::class, 'index'])->name('landing');

    // Halaman list semua artikel
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    // Halaman detail artikel menggunakan slug untuk SEO friendly URL
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

    // Halaman kategori artikel (buat route ini karena error 'category.show' tidak ditemukan)
    // Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

    // home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

    //comment
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Hightlights
    Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

    // author
    Route::get('/author/{id}', [AuthorController::class, 'show'])->name('author.show');

    // latest
    Route::get('/posts/{id}', [ArticleController::class, 'show'])->name('posts.show');

    //LATEST
    // Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

    // search category
    Route::get('/search', [ArticleController::class, 'search'])->name('search');

    // author route
    Route::get('/author/{id}', [AuthorController::class, 'show'])->name('author.show');

    //subs 
    Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');

    //get nav category
    Route::get('/category/{slug}', [CategoryController::class, 'show']);

    //footer dinamis
    Route::get('/kategori/{id}', [CategoryController::class, 'show'])->name('kategori.show');

    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    })->name('filament.admin.auth.logout');
