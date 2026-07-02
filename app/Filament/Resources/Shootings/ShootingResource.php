<?php

namespace App\Filament\Resources\Shootings;

use App\Filament\Resources\Shootings\Pages\CreateShooting;
use App\Filament\Resources\Shootings\Pages\EditShooting;
use App\Filament\Resources\Shootings\Pages\ListShootings;
use App\Filament\Resources\Shootings\Schemas\ShootingForm;
use App\Filament\Resources\Shootings\Tables\ShootingsTable;
use App\Models\Shooting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ShootingResource extends Resource
{
    protected static ?string $model = Shooting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCamera;

    protected static ?string $modelLabel = 'Shooting';
    protected static ?string $pluralModelLabel = 'Shootings';
    protected static ?string $navigationLabel = 'Shootings';
    protected static string|\UnitEnum|null $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ShootingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ShootingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListShootings::route('/'),
            'create' => CreateShooting::route('/create'),
            'edit'   => EditShooting::route('/{record}/edit'),
        ];
    }
}
