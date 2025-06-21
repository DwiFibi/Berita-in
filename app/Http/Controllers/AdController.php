<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Support\Facades\Cache;

class AdController extends Controller
{
    public function getAdsByPosition($position)
    {
        return Cache::remember("ads_position_{$position}", 300, function () use ($position) {
            return Ad::where('position', $position)
                ->where('is_active', true)
                ->get();
        });
    }
}
