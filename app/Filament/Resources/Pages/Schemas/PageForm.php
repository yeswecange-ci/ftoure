<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title'),
                TextInput::make('subtitle'),
                FileUpload::make('header_image')
                    ->image(),
                TextInput::make('bio_title'),
                Textarea::make('bio_content')
                    ->columnSpanFull(),
                FileUpload::make('bio_image_1')
                    ->image(),
                FileUpload::make('bio_image_2')
                    ->image(),
                FileUpload::make('bio_image_3')
                    ->image(),
                Textarea::make('booking_description')
                    ->columnSpanFull(),
                TextInput::make('booking_phone')
                    ->tel(),
                TextInput::make('booking_email')
                    ->email(),
            ]);
    }
}
