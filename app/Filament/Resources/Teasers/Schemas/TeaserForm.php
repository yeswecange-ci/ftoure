<?php

namespace App\Filament\Resources\Teasers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeaserForm
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
                FileUpload::make('poster_image')
                    ->image(),
                TextInput::make('video_url')
                    ->url(),
            ]);
    }
}
