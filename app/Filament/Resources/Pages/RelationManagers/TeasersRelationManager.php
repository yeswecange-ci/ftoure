<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\Teasers\Schemas\TeaserForm;
use App\Filament\Resources\Teasers\Tables\TeasersTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class TeasersRelationManager extends RelationManager
{
    protected static string $relationship = 'teasers';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return TeaserForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return TeasersTable::configure($table);
    }
}
