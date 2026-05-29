<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Filament\Resources\SocialLinks\Schemas\SocialLinkForm;
use App\Filament\Resources\SocialLinks\Tables\SocialLinksTable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class SocialLinksRelationManager extends RelationManager
{
    protected static string $relationship = 'socialLinks';

    protected static ?string $recordTitleAttribute = 'platform';

    public function form(Schema $schema): Schema
    {
        return SocialLinkForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return SocialLinksTable::configure($table);
    }
}
