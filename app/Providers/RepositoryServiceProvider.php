<?php

namespace App\Providers;


use App\Contracts\CustomerContract;
use App\Contracts\productContract;
use App\Repositories\CustomerRepository;
use App\Repositories\productRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(productContract::class, productRepository::class);
        $this->app->bind(CustomerContract::class, CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
