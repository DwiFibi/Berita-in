<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'bio', 'profile_image', 'is_active'];


    // Relasi ke Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // app/Models/Author.php
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
