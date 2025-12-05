<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use App\Models\City;
use App\Models\Metro;
use App\Models\Region;
use App\Models\SubCategory;
use App\Models\University;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    /**
     * @param \Filament\Schemas\Schema $schema
     * @return \Filament\Schemas\Schema
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Section::make('Asosiy ma\'lumotlar')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255) // products.name -> string(255)
                            ->label('Nomi/Sarlavhasi'),
                        TextInput::make('price')
                            ->numeric()
                            ->required()
                            // 'decimal' ga mos keladi, lekin tekshirish uchun:
                            ->extraAttributes(['max' => 99999999.99]) // Taxminiy chegara
                            ->label('Narxi (USD)') 
                            ->suffix('USD'),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20) // products.phone -> string(20)
                            ->label('Telefon raqami')
                            ->nullable(), 
                        TextInput::make('landmark')
                            ->maxLength(255) // products.landmark -> string(255)
                            ->label('Mo\'ljal/Joylashuv')
                            ->nullable(),
                    ]),
                
                // --- Xususiyatlar Bo'limi ---
                Section::make('Xususiyatlar')
                    ->columns(3)
                    ->components([ 
                        TextInput::make('rooms')->integer()->label('Xonalar soni')->nullable(),
                        TextInput::make('square')->integer()->label('Maydoni (kv.m)')->nullable(),
                        Select::make('repair')
                            ->options([
                                'yangi' => 'Yangi remont',
                                'o\'rta' => 'O\'rta holatda',
                                'ta\'mir_talab' => 'Ta\'mir talab',
                            ])
                            ->label('Ta\'mir holati')
                            ->nullable(),
                        TextInput::make('floor')->integer()->label('Qavat')->nullable(),
                        TextInput::make('building_floor')->integer()->label('Bino Qavati')->nullable(),
                        TextInput::make('sotix')->integer()->label('Sotix (Yer maydoni)')->nullable(),

                    ]),
                
                Section::make('Rasmlar va Tavsif')
                    ->columns(1)
                    ->components([ 
                        FileUpload::make('images')
                            ->multiple()
                            ->image()
                            ->maxFiles(7)
                            ->directory('product-images')
                            ->label('Rasmlar (7 tagacha)'),
                        RichEditor::make('description')
                            ->label('Batafsil ma\'lumot')
                            ->nullable(),
                    ]),
                    Section::make('Universitet va Metro bekatlarini tanlash')
                    ->columns(2)
                    ->components([
                        Section::make('Metro Bekatini Tanlash')
                        ->columns(1)
                        ->components([
                            Select::make('metro_id') 
                                ->label('Eng yaqin bekat')
                                ->options(Metro::pluck('metro_name', 'id')) 
                                ->searchable() 
                                ->nullable(),
                        ]),

                    Section::make('Universitetni Tanlash')
                        ->columns(1)
                        ->components([
                        Select::make('university_id') 
                            ->label('Eng yaqin Universitet')
                            ->options(University::pluck('university_name', 'id')) 
                            ->searchable() 
                            ->nullable(),
                        ])
                    ]),

                    Section::make('Kategorya va Sub-kategoriya tanlash')
                    ->columns(2)
                    ->components([
                        Select::make('category_id')
                            ->label('Kategoriya')
                            ->options(Category::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->live() 
                            ->afterStateUpdated(fn (callable $set) => $set('subcategory_id', null)), 
                        
                        Select::make('subcategory_id')
                            ->label('Sub-kategoriya')
                            ->options(function (callable $get) {
                                $categoryId = $get('category_id');
                                
                                if (!$categoryId) {
                                    return SubCategory::pluck('name', 'id');
                                }

                                return SubCategory::query()
                                    ->where('category_id', $categoryId)
                                    ->pluck('name', 'id');
                            })
                            ->required()
                            ->searchable()
                            ->live(),
                    
               
                        ]),

                    Section::make('Uyingiz joylashgan Region va Shaharni tanlang.') // Section dan boshlaymiz
                    ->columns(2) 
                    ->components([
                        
                        Select::make('region_id')
                            ->label('Viloyat/Region')
                            ->options(Region::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->live() 
                            ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),

                        Select::make('city_id')
                            ->label('Shahar/Tuman')
                            ->options(function (callable $get) {
                                $regionId = $get('region_id');

                                if (!$regionId) {
                                    return City::pluck('name', 'id');
                                }

                                return City::query()
                                    ->where('region_id', $regionId)
                                    ->pluck('name', 'id');
                            })
                            ->required()
                            ->searchable()
                            ->live(),
                    ]),
            ]);

            
    }
}