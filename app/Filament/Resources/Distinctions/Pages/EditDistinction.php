<?php

namespace App\Filament\Resources\Distinctions\Pages;

use App\Filament\Resources\Distinctions\DistinctionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDistinction extends EditRecord
{
    protected static string $resource = DistinctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
