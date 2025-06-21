<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Article;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'parent_id',
        'name',
        'email',
        'content'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('children');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // pastikan kolom 'user_id' ada di tabel comments
    }
}
