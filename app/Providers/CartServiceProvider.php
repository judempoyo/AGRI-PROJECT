<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use app\Repositories\CartInterfaceRepository;
use app\Repositories\CartSessionRepository;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterfaceRepository::class, CartSessionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
