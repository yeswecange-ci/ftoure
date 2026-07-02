<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\Distinctions\Schemas\DistinctionForm;
use App\Filament\Resources\Distinctions\Tables\DistinctionsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class DistinctionsRelationManager extends RelationManager
{
    protected static string $relationship = 'distinctions';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return DistinctionForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return DistinctionsTable::configure($table);
    }
}
