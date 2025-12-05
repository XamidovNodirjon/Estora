<?php

namespace App\Filament\Resources\Metros;

use App\Filament\Resources\Metros\Pages\CreateMetro;
use App\Filament\Resources\Metros\Pages\EditMetro;
use App\Filament\Resources\Metros\Pages\ListMetros;
use App\Filament\Resources\Metros\Pages\ViewMetro;
use App\Filament\Resources\Metros\Schemas\MetroForm;
use App\Filament\Resources\Metros\Schemas\MetroInfolist;
use App\Filament\Resources\Metros\Tables\MetrosTable;
use App\Models\Metro;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class MetroResource extends Resource
{
    protected static ?string $model = Metro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no';

    public static function form(Schema $schema): Schema
    {
        return MetroForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MetroInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MetrosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMetros::route('/'),
            'create' => CreateMetro::route('/create'),
            'view' => ViewMetro::route('/{record}'),
            'edit' => EditMetro::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Auth::user();
        
        // Faqat super admin ko‘ra oladi
        return $user->position_id == 1 ?? false;
    }
}