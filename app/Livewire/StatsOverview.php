<?php

namespace App\Livewire;

use App\Models\Categorie;
use App\Models\Deposit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



//use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        /* dd(Product::select('id')->where('user_id', Auth::user()->id)->get()); */
        return [
            stat::make('Alerte(s) de stock', count(Product::all()->where('user_id', Auth::user()->id)->where('Quantity', '<=', 100)))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Produits disponible', count(Product::all()->where('user_id', Auth::user()->id)))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Mes depots', count(Deposit::all()->where('user_id', Auth::user()->id)))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),

            stat::make('commandes en attente', count(Order::all()->where('customer_id', Auth::user()->id)->where('state', 'en attente')))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Commandes passees', count(Order::all()->where('customer_id', Auth::user()->id)))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),
            stat::make('Commandes du jours', count(Order::all()->where('customer_id', Auth::user()->id)->where('date', date('Y-m-d'))))
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                /*  ->descriptionIcon('heroicon-s-trending-up') */
                ->color('primary'),


            /* stat::make('Total des ventes', OrderDetail::all()->whereIn('product_id', Product::select('id')->where('user_id', Auth::user()->id)->get())->sum(('total')) . ' CDF')
                ->extraAttributes([
                    'class' => 'cursor-pointer'
                ])
                // ->descriptionIcon('heroicon-s-trending-up') 
                ->color('primary'), */



        ];
    }
}
