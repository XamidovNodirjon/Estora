<?php

namespace App\Filament\Widgets;

use App\Models\Metro;
use App\Models\User;
use App\Models\Product;
use App\Models\University;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class CustomStatsOverview extends BaseWidget
{
    protected function getColumns(): int | array
    {
        return [
            'default' => 1,
            'sm' => 2,
            'lg' => 3,
            'xl' => 3,
        ];
    }
     
    protected function getStats(): array
    {
        return [
            Stat::make('Jami Foydalanuvchilar', User::count())
                ->description('Tizimdagi barcha foydalanuvchilar soni')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Aktiv Uy Elonlari', Product::count())
                ->description('Sotuvdagi joriy elonlar soni')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('info'),

            Stat::make('Sotuv Menejerlari', User::whereHas('position', fn($q) => $q->whereIn('position_id', [2,3]))->count())
                ->description('Maʼlumotlarni kirituvchi aktiv managerlar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),

            Stat::make('Universitetlar soni', University::count())
                ->description('Tizimdagi universitetlar soni')
                ->descriptionIcon('heroicon-m-building-library')
                ->color('primary'),
                
            Stat::make('Metro soni', Metro::count())
                ->description('Tizimdagi metro stansiyalari soni')
                ->descriptionIcon('heroicon-m-arrows-right-left')
                ->color('danger'),
        ];
    }
    
    public static function canAccess(): bool
    {
        $user = Auth::user();
        // Faqat super admin ko‘ra oladi dashboardni
        return $user->position_id == 1 ?? true;
    }
}