<?php

namespace App\Filament\Resources\Metros\Pages;

use App\Filament\Resources\Metros\MetroResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMetro extends ViewRecord
{
    protected static string $resource = MetroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
