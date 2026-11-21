<?php

namespace App\Filament\Resources\ContactLocations\Pages;

use App\Filament\Resources\ContactLocations\ContactLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageContactLocations extends ManageRecords
{
    protected static string $resource = ContactLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
