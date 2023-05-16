<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Img_slideRepository;
use App\Repositories\Interface\Img_slideRepositoryInterface;
use App\Repositories\ManufacturerRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\ManufacturerRepositoryInterface;
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
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(Img_slideRepositoryInterface::class, Img_slideRepository::class);
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
