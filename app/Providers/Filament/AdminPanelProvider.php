<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
// use Filament\Http\Middleware\AuthenticateSession; // Ini adalah AuthenticateSession dari Filament, bukan Illuminate
use Illuminate\Session\Middleware\AuthenticateSession; // Pastikan ini yang dari Illuminate\Session
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Controllers\Auth\LogoutController; // <--- IMPORT INI
use Illuminate\Support\Facades\Route as LaravelRoute; // <--- ALIAS UNTUK MENGHINDARI KONFLIK JIKA ADA

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $panel = $panel
            ->id('admin')
            ->path('admin')
            ->login() // Biarkan ini tetap ada, mungkin menangani hal lain selain route
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                \App\Filament\Widgets\AdminOverview::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class, // Pastikan ini Illuminate\Session\Middleware\AuthenticateSession
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandName(name: "Berita'in")
            ->routes(function () {
                LaravelRoute::post('/logout', LogoutController::class)
                    ->name('auth.logouts');
            });

        logger('Panel ID: ' . $panel->getId()); // Ini bagus untuk debugging
        // logger('Logout route tersedia: ' . LaravelRoute::has('filament.admin.auth.logout')); // Bisa ditambahkan untuk cek
        return $panel;
    }
}
