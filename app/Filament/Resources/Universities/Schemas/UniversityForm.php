<?php

namespace App\Filament\Resources\Universities\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

class UniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asosiy ma\'lumotlar')
                    ->columns(2)
                    ->components([
                        TextInput::make('university_name')
                            ->required()
                            ->maxLength(255)
                    ]),
            ]);
    }
}
