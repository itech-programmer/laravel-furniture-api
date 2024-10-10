<?php

namespace App\Providers;

use App\Contracts\FurnitureRepositoryInterface;
use App\Contracts\FurnitureServiceInterface;
use App\Repositories\FurnitureRepository;
use App\Services\FurnitureService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FurnitureRepositoryInterface::class, FurnitureRepository::class);
        $this->app->bind(FurnitureServiceInterface::class, FurnitureService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
