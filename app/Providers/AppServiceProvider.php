<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            \App\Http\Services\Cart\CartServiceInterface::class,
            \App\Http\Services\Cart\CartService::class
        );
        $this->app->bind(
            \App\Http\Services\Category\CategoryServiceInterface::class,
            \App\Http\Services\Category\CategoryService::class
        );
        $this->app->bind(
            \App\Http\Services\Order\OrderServiceInterface::class,
            \App\Http\Services\Order\OrderService::class
        );
        $this->app->bind(
            \App\Http\Services\Product\ProductServiceInterface::class,
            \App\Http\Services\Product\ProductService::class
        );

    }
}
