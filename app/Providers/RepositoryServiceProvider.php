<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Img_slideRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\Img_slideRepositoryInterface;
use App\Repositories\Interface\ManufacturerRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ManufacturerRepository;
use App\Repositories\MongoDB\CategoryCollectionRepository;
use App\Repositories\MongoDB\Img_slideCollectionRepository;
use App\Repositories\MongoDB\ManufacturerCollectionRepository;
use App\Repositories\MongoDB\ProductCollectionRepository;
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
        $this->app->bind(CategoryRepositoryInterface::class, CategoryCollectionRepository::class);
        $this->app->bind(ManufacturerRepositoryInterface::class, ManufacturerCollectionRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductCollectionRepository::class);
        $this->app->bind(Img_slideRepositoryInterface::class, Img_slideCollectionRepository::class);
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
