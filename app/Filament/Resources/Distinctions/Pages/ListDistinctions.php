<?php

namespace App\Filament\Resources\Distinctions\Pages;

use App\Filament\Resources\Distinctions\DistinctionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDistinctions extends ListRecords
{
    protected static string $resource = DistinctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
