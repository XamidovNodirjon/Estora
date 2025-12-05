<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected static string $routePath = '/';

    protected static ?int $navigationSort = -2;

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\CustomStatsOverview::class,
        ];
    }

    
}