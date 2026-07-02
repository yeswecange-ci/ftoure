<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\Shootings\Schemas\ShootingForm;
use App\Filament\Resources\Shootings\Tables\ShootingsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ShootingsRelationManager extends RelationManager
{
    protected static string $relationship = 'shootings';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return ShootingForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return ShootingsTable::configure($table);
    }
}
