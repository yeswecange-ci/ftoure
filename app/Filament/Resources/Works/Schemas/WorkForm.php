<?php

namespace App\Filament\Resources\Works\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WorkForm
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
                TextInput::make('year_or_label'),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('role_or_description'),
            ]);
    }
}
