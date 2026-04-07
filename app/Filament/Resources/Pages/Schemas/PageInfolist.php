<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('slug'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('subtitle')
                    ->placeholder('-'),
                ImageEntry::make('header_image')
                    ->placeholder('-'),
                TextEntry::make('bio_title')
                    ->placeholder('-'),
                TextEntry::make('bio_content')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('bio_image_1')
                    ->placeholder('-'),
                ImageEntry::make('bio_image_2')
                    ->placeholder('-'),
                ImageEntry::make('bio_image_3')
                    ->placeholder('-'),
                TextEntry::make('booking_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('booking_phone')
                    ->placeholder('-'),
                TextEntry::make('booking_email')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
