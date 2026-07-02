<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NewsForm
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
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Image principale')
                    ->image(),
                FileUpload::make('gallery')
                    ->label("Galerie d'images")
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->directory('galleries')
                    ->columnSpanFull(),
                TextInput::make('link'),
                Toggle::make('is_featured')
                    ->required(),
            ]);
    }
}
