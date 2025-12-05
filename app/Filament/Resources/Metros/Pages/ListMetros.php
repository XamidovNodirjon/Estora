<?php

namespace App\Filament\Resources\Metros\Pages;

use App\Filament\Resources\Metros\MetroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMetros extends ListRecords
{
    protected static string $resource = MetroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
