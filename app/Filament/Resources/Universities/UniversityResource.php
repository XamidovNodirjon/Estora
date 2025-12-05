<?php

namespace App\Filament\Resources\Universities;

use App\Filament\Resources\Universities\Pages\CreateUniversity;
use App\Filament\Resources\Universities\Pages\EditUniversity;
use App\Filament\Resources\Universities\Pages\ListUniversities;
use App\Filament\Resources\Universities\Pages\ViewUniversity;
use App\Filament\Resources\Universities\Schemas\UniversityForm;
use App\Filament\Resources\Universities\Schemas\UniversityInfolist;
use App\Filament\Resources\Universities\Tables\UniversitiesTable;
use App\Models\University;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UniversityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UniversityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UniversitiesTable::configure($table);
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
            'index' => ListUniversities::route('/'),
            'create' => CreateUniversity::route('/create'),
            'view' => ViewUniversity::route('/{record}'),
            'edit' => EditUniversity::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = Auth::user();
        // Faqat super admin ko‘ra oladi
        return $user->position_id == 1 ?? false;
    }
}

