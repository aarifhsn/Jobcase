<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Resources\JobResource;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use App\Filament\Resources\CompanyResource;
use App\Filament\Resources\BlogPostResource;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/dashboard/admin')
            ->profile()
            ->login()
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->brandLogo(asset('images/logo-dark.png'))
            ->darkModeBrandLogo(asset('images/logo-light.png'))
            ->brandName('jobBoard')
            ->font('Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap')
            ->favicon(asset('images/favicon.ico'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('16rem')
            ->collapsibleNavigationGroups(true)
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                StatsOverview::class,
                CompanyResource\Widgets\CompanyStats::class,
                JobResource\Widgets\JobPostsChart::class,
            ])
            ->resources([
                BlogPostResource::class,
                CompanyResource::class,
                JobResource::class,
                UserResource::class,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Administration')
                    ->icon('heroicon-o-cog')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Business')
                    ->icon('heroicon-o-briefcase')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Subscription')
                    ->icon('heroicon-o-credit-card')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('CMS')
                    ->icon('heroicon-s-pencil')
                    ->collapsed(),
            ])
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
