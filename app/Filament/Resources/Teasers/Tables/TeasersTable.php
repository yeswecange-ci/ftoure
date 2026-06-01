<?php

namespace App\Filament\Resources\Teasers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeasersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page.title')
                    ->label('Page')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),

                ImageColumn::make('poster_image')
                    ->label('Poster'),

                IconColumn::make('video_file')
                    ->label('Vidéo uploadée')
                    ->boolean()
                    ->trueIcon('heroicon-o-film')
                    ->falseIcon('heroicon-o-minus')
                    ->state(fn ($record) => (bool) $record->video_file),

                TextColumn::make('video_url')
                    ->label('Lien vidéo')
                    ->limit(40)
                    ->url(fn ($record) => $record->video_url)
                    ->openUrlInNewTab(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
