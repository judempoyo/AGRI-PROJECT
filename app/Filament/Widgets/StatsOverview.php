<?php

namespace App\Filament\Widgets;

use App\Models\Categorie;
use App\Models\Deposit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Spatie\Permission\Traits\HasRoles;

//use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            stat::make('Produits disponible', count(Product::all()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Categorie(s) des produits', count(Categorie::all()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('commandes en attente', count(Order::all()->where('state', 'en attente')))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Commandes passees', count(Order::all()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Commandes du jours', count(Order::all()->where('date', today())))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Total des ventes', Order::all()->sum(('total')) . ' CDF')
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Depots crees', count(Deposit::all()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),


            stat::make('Producteurs enregistrer', count(User::role('grower')->get()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Utilisateurs enregistres', count(User::all()))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),
        ];
    }
}
