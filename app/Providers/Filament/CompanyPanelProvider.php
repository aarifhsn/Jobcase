<?php

namespace App\Providers\Filament;

use App\Filament\Company\Pages\Auth\Register;
use App\Filament\Company\Pages\Auth\RegisterCompany;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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

class CompanyPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('company')
            ->path('dashboard/company')
            ->login()
            ->registration(Register::class)
            ->profile()
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->brandLogo(asset('images/logo-dark.png'))
            ->darkModeBrandLogo(asset('images/logo-light.png'))
            ->brandName('jobBoard')
            ->font('Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap')
            ->favicon(asset('images/favicon.ico'))
            ->discoverResources(in: app_path('Filament/Company/Resources'), for: 'App\\Filament\\Company\\Resources')
            ->discoverPages(in: app_path('Filament/Company/Pages'), for: 'App\\Filament\\Company\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('16rem')
            ->collapsibleNavigationGroups(true)
            ->defaultThemeMode(ThemeMode::Dark)
            ->discoverWidgets(in: app_path('Filament/Company/Widgets'), for: 'App\\Filament\\Company\\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
