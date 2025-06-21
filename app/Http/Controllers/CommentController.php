<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'parent_id' => 'nullable|exists:comments,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        $comment = Comment::create($validated);

        // Hapus cache terkait komentar dan jumlah komentar
        Cache::forget("comments_article_{$validated['article_id']}");
        Cache::forget("comment_count_{$validated['article_id']}");

        // Simpan cookie jika user centang "save_info"
        if ($request->has('save_info') && $request->save_info) {
            Cookie::queue('comment_name', $request->name, 60 * 24 * 30); // 30 hari
            Cookie::queue('comment_email', $request->email, 60 * 24 * 30);
        } else {
            Cookie::queue(Cookie::forget('comment_name'));
            Cookie::queue(Cookie::forget('comment_email'));
        }

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
