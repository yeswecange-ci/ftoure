<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\Agendas\Schemas\AgendaForm;
use App\Filament\Resources\Agendas\Tables\AgendasTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AgendasRelationManager extends RelationManager
{
    protected static string $relationship = 'agendas';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $schema): Schema
    {
        return AgendaForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return AgendasTable::configure($table);
    }
}
