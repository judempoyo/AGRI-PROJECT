<?php

namespace App\Filament\Resources\SellUnitResource\Pages;

use App\Filament\Resources\SellUnitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSellUnit extends EditRecord
{
    protected static string $resource = SellUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
