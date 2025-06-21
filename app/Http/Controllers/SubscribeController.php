<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        Subscribe::create(['email' => $request->email]);

        // Jika ada cache yang tergantung pada jumlah subscriber, hapus di sini:
        // Cache::forget('subscriber_count'); // contoh

        return redirect()->back()->with('success', 'Berhasil berlangganan!');
    }
}
