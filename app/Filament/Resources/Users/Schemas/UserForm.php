<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Position;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Asosiy ma\'lumotlar')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('foydalanuvchining ismi'),
                        TextInput::make('phone')
                            ->maxLength(20)
                            ->label('Telefon raqami')
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->label('Elektron pochta manzili')
                            ->required(),
                        TextInput::make('password')
                            ->maxLength(255)
                            ->label('Parol')
                            ->required(),
                        TextInput::make('passport')
                            ->maxLength(255)
                            ->label('Passport ma\'lumotlari')
                            ->nullable(),
                        TextInput::make('jshshir')
                            ->maxLength(255)
                            ->label('JSHSHIR')
                            ->nullable(),
                        TextInput::make('username')
                            ->maxLength(255)
                            ->label('Foydalanuvchi nomi')
                            ->required()
                    ]),

                    Section::make('Lavozimni Tanlash')
                    ->columns(1)
                    ->components([
                        Select::make('position_id') 
                            ->options(Position::pluck('name', 'id')) 
                            ->searchable() 
                            ->required()
                    ]),
                    
            ]);
    }
}
