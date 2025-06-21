<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'author_id',
        'category_id',
        'status',
        'published_at', // pastikan ini ada dan konsisten
        'is_latest',
        'is_popular',
        'is_featured',
        'is_newest',
        'is_highlight',
        'uploaded_at',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class); // tanpa filter parent_id
    }



    protected $casts = [
        'published_at' => 'datetime',
    ];
}
