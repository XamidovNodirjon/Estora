<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserCount extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users Count', User::count())
                ->description('Total registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
}
