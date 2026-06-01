<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->label('Identifiant (URL)')
                    ->required()
                    ->helperText('Identifiant technique de l’univers (ex. actrice). À ne pas modifier sans précaution.'),
                TextInput::make('name')
                    ->label('Nom de l’univers')
                    ->helperText('Libellé affiché sur la page d’accueil et le bloc « Découvrez aussi ».'),
                TextInput::make('sort_order')
                    ->label('Ordre d’affichage')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->label('Publié')
                    ->default(true)
                    ->helperText('Si désactivé, l’univers n’apparaît plus sur la page d’accueil.'),
                FileUpload::make('card_image')
                    ->label('Image de vignette (accueil)')
                    ->image()
                    ->directory('pages')
                    ->helperText('Photo portrait utilisée sur la page d’accueil. À défaut, l’image d’en-tête est utilisée.'),
                TextInput::make('title')
                    ->label('Titre d’en-tête'),
                TextInput::make('subtitle')
                    ->label('Sous-titre d’en-tête'),
                FileUpload::make('header_image')
                    ->label('Image d’en-tête')
                    ->image()
                    ->directory('pages'),
                TextInput::make('bio_title')
                    ->label('Titre de la biographie'),
                Textarea::make('bio_content')
                    ->label('Contenu de la biographie')
                    ->columnSpanFull(),
                FileUpload::make('bio_image_1')
                    ->label('Image biographie 1')
                    ->image()
                    ->directory('pages'),
                FileUpload::make('bio_image_2')
                    ->label('Image biographie 2')
                    ->image()
                    ->directory('pages'),
                FileUpload::make('bio_image_3')
                    ->label('Image biographie 3')
                    ->image()
                    ->directory('pages'),
                Textarea::make('booking_description')
                    ->label('Description booking')
                    ->columnSpanFull(),
                TextInput::make('booking_phone')
                    ->label('Téléphone booking')
                    ->tel(),
                TextInput::make('booking_email')
                    ->label('E-mail booking')
                    ->email(),
            ]);
    }
}
