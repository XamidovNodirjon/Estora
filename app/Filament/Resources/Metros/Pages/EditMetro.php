<?php

namespace App\Filament\Resources\Metros\Pages;

use App\Filament\Resources\Metros\MetroResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMetro extends EditRecord
{
    protected static string $resource = MetroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
