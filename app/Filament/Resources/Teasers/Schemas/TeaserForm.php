<?php

namespace App\Filament\Resources\Teasers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeaserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_id')
                    ->relationship('page', 'title')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Page'),

                TextInput::make('title')
                    ->required()
                    ->label('Titre'),

                FileUpload::make('poster_image')
                    ->image()
                    ->label('Image poster'),

                Section::make('Vidéo')
                    ->description('Uploadez un fichier vidéo OU renseignez un lien externe (YouTube, Vimeo…)')
                    ->schema([
                        FileUpload::make('video_file')
                            ->label('Fichier vidéo')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg', 'video/quicktime', 'video/x-msvideo'])
                            ->directory('teasers/videos')
                            ->hint('Formats acceptés : MP4, WebM, OGG, MOV, AVI'),

                        TextInput::make('video_url')
                            ->label('Lien vidéo externe')
                            ->url()
                            ->placeholder('https://youtube.com/watch?v=...')
                            ->hint('YouTube, Vimeo ou tout autre lien vidéo'),
                    ]),
            ]);
    }
}
