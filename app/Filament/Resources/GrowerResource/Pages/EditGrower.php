<?php

namespace App\Filament\Resources\GrowerResource\Pages;

use App\Filament\Resources\GrowerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrower extends EditRecord
{
    protected static string $resource = GrowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
