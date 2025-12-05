<?php

namespace App\Providers;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->pages([
                \App\Filament\Pages\Dashboard::class,
            ])
            ->widgets([
               \App\Filament\Widgets\CustomStatsOverview::class,
            ]);
    }
}
