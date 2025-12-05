<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use Faker\Guesser\Name;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable()->label('ID'),
                TextColumn::make('name')->searchable()->sortable()->label('Nomi'),
                TextColumn::make('price')->searchable()->money('USD')->sortable()->label('Narxi'),
                TextColumn::make('rooms')->searchable()->label('Xonalar'),
                TextColumn::make('square')->label('Maydoni (kv.m)'),
                ToggleColumn::make('status')->label('Aktiv'),
                TextColumn::make('created_at')->dateTime()->sortable()->label('Sana'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
