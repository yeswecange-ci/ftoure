<?php

namespace App\Filament\Resources\Distinctions;

use App\Filament\Resources\Distinctions\Pages\CreateDistinction;
use App\Filament\Resources\Distinctions\Pages\EditDistinction;
use App\Filament\Resources\Distinctions\Pages\ListDistinctions;
use App\Filament\Resources\Distinctions\Schemas\DistinctionForm;
use App\Filament\Resources\Distinctions\Tables\DistinctionsTable;
use App\Models\Distinction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DistinctionResource extends Resource
{
    protected static ?string $model = Distinction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTrophy;

    protected static ?string $modelLabel = 'Distinction';
    protected static ?string $pluralModelLabel = 'Distinctions & Nominations';
    protected static ?string $navigationLabel = 'Distinctions';
    protected static string|\UnitEnum|null $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return DistinctionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DistinctionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListDistinctions::route('/'),
            'create' => CreateDistinction::route('/create'),
            'edit'   => EditDistinction::route('/{record}/edit'),
        ];
    }
}
