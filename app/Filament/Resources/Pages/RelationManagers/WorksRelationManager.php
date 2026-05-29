<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\Works\Schemas\WorkForm;
use App\Filament\Resources\Works\Tables\WorksTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class WorksRelationManager extends RelationManager
{
    protected static string $relationship = 'works';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return WorkForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return WorksTable::configure($table);
    }
}
