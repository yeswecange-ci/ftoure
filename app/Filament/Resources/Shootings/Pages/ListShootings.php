<?php

namespace App\Filament\Resources\Shootings\Pages;

use App\Filament\Resources\Shootings\ShootingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListShootings extends ListRecords
{
    protected static string $resource = ShootingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
