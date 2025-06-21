<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
    ];

    // Relasi dengan Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Slug otomatis (boleh tetap ada)
    protected static function booted(): void
    {
        static::creating(function ($category) {
            $baseSlug = Str::slug($category->name);
            $slug = $baseSlug;
            $count = 1;

            while (Category::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $category->slug = $slug;
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $baseSlug = Str::slug($category->name);
                $slug = $baseSlug;
                $count = 1;

                while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $category->slug = $slug;
            }
        });
    }
}
