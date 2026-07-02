<?php

namespace App\Filament\Resources\Shootings\Pages;

use App\Filament\Resources\Shootings\ShootingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditShooting extends EditRecord
{
    protected static string $resource = ShootingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
