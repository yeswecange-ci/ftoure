<?php

namespace App\Filament\Resources\Shootings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShootingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->helperText('Laisser vide pour générer automatiquement depuis le titre.')
                    ->maxLength(255),
                TextInput::make('year_or_label')
                    ->label('Année / libellé'),
                TextInput::make('role_or_description')
                    ->label('Sous-titre'),
                FileUpload::make('image')
                    ->label('Image principale')
                    ->image(),
                Textarea::make('description')
                    ->label('Description détaillée')
                    ->rows(5)
                    ->columnSpanFull(),
                FileUpload::make('gallery')
                    ->label("Galerie d'images")
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->directory('galleries')
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label("Ordre d'affichage")
                    ->numeric()
                    ->default(0),
            ]);
    }
}
