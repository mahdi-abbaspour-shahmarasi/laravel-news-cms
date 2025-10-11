<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
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
use Rmsramos\Activitylog\ActivitylogPlugin;
use Filament\Navigation\MenuItem;
use App\Filament\Pages\Profile;
use Filament\FontProviders\LocalFontProvider;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->spa()
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
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
            ])
            /** Custom Configs */
            ->brandName('مدیریت محتوا')
            ->sidebarCollapsibleOnDesktop()
            ->sidebarFullyCollapsibleOnDesktop()
            ->sidebarWidth('20rem')
            ->font(
                'YekanBakh-Regular',
                url: asset('fonts/font.css'),
                provider: LocalFontProvider::class,
            )
            // ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->plugin(FilamentShieldPlugin::make())
            ->plugins([ActivitylogPlugin::make(),])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('محتوا')
                    ->icon('heroicon-o-pencil-square'),
                NavigationGroup::make()
                    ->label('دسترسی و کاربران سیستم')
                    ->icon('heroicon-o-users'),
                NavigationGroup::make()
                    ->label('تنظیمات')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsed(TRUE),
                NavigationGroup::make()
                    ->label('نقش‌ها و دسترسی‌ها')
                    ->icon('heroicon-o-adjustments-vertical'),
                NavigationGroup::make()
                    ->label('آمار')
                    ->icon('heroicon-o-presentation-chart-line'),
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('پروفایل')
                    ->url(fn (): string =>  Profile::getUrl())
                    ->icon('heroicon-o-user'),
            ]);

    }
}
