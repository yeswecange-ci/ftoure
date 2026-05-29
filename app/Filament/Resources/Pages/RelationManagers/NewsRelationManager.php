<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\News\Schemas\NewsForm;
use App\Filament\Resources\News\Tables\NewsTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class NewsRelationManager extends RelationManager
{
    protected static string $relationship = 'news';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return NewsForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return NewsTable::configure($table);
    }
}
