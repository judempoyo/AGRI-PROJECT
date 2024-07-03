<?php

namespace App\Filament\Resources\AdressResource\Pages;

use App\Filament\Resources\AdressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdresses extends ListRecords
{
    protected static string $resource = AdressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
