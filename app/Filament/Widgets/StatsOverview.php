<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
//use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            stat::make('unique view', '123.32K')
                ->description('test')
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
        ];
    }
}
