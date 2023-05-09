<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\HangsanxuatRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\HangsanxuatRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
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
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(HangsanxuatRepositoryInterface::class, HangsanxuatRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
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
