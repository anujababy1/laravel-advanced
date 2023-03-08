<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Repositories\CustomerRepositoryInterface;
use  App\Repositories\CustomerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class,CustomerRepository::class);
    }
}
