<?php

namespace App\Filament\Resources\Teasers;

use App\Filament\Resources\Teasers\Pages\CreateTeaser;
use App\Filament\Resources\Teasers\Pages\EditTeaser;
use App\Filament\Resources\Teasers\Pages\ListTeasers;
use App\Filament\Resources\Teasers\Schemas\TeaserForm;
use App\Filament\Resources\Teasers\Tables\TeasersTable;
use App\Models\Teaser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TeaserResource extends Resource
{
    protected static ?string $model = Teaser::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedVideoCamera;

    protected static ?string $modelLabel = 'Teaser';
    protected static ?string $pluralModelLabel = 'Teasers';
    protected static ?string $navigationLabel = 'Teasers';
    protected static string|\UnitEnum|null $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return TeaserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeasersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTeasers::route('/'),
            'create' => CreateTeaser::route('/create'),
            'edit'   => EditTeaser::route('/{record}/edit'),
        ];
    }
}
