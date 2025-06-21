<?php

namespace App\Filament\Widgets;

use App\Models\{
    Article,
    Author,
    Category,
    Comment,
    Subscribe,
    Ad
};
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\HtmlString;

class AdminOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->description('Jumlah semua kategori')
                ->icon('heroicon-o-rectangle-group')
                ->color('success'),

            Stat::make('Total Ads', Ad::count())
                ->description('Jumlah semua iklan')
                ->icon('heroicon-o-bolt')
                ->color('warning'),

            Stat::make('Total Comments', Comment::count())
                ->description('Jumlah semua komentar')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('info'),

            Stat::make('Total Articles', Article::count())
                ->description('Jumlah semua artikel')
                ->icon('heroicon-o-document-text')
                ->color('primary'),

            Stat::make('Total Authors', Author::count())
                ->description('Jumlah semua penulis')
                ->icon('heroicon-o-user-group')
                ->color('secondary'),

            Stat::make('Total Subscribers', Subscribe::count())
                ->description('Jumlah semua pelanggan')
                ->icon('heroicon-o-envelope')
                ->color('danger'),
        ];
    }
}
