<?php

namespace App\Filament\Resources\Metros\Schemas;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Schema;

class MetroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asosiy ma\'lumotlar')
                    ->columns(2)
                    ->components([
                        TextInput::make('metro_name')
                            ->required()
                            ->maxLength(255)
                    ]),
            ]);
    }
}
