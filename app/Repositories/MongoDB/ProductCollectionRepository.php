<?php

namespace App\Repositories\MongoDB;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductDetailDomain;
use App\Models\ProductDomain;
use App\Repositories\BaseRepository;
use App\Repositories\Interface;
use Illuminate\Support\Collection;

class ProductCollectionRepository extends BaseRepository implements Interface\ProductRepositoryInterface
{
    public function __construct(Product $productmodel)
    {
        $this->model = $productmodel;
    }

    /**
     * @param $id
     * @return ProductDetailDomain
     */
    public function findByIdDetail($id): ProductDetailDomain
    {
        $data = $this->model->newModelQuery()->find($id);
        return $data->convertToDomainDetail();
    }
    public function convertall(): Collection
    {
        $data = $this->model->all();
        $convertedModels = $data->map(function ($model) {
            return $model->convertToDomain();
        });
        return $convertedModels;
    }
    public function findCateById($id)
    {
        $product_cate =  $this->model->find($id);
        $category_id = $product_cate->id_cate;
        $category = Category::where('_id', $category_id)->first();
        $category_name = $category->name_cate;
        return $category_name;
    }

    public function findManuById($id)
    {
        $product_Manu =  $this->model->find($id);
        $manufacturer_id = $product_Manu->id_manufact;
        $manufacturer = Manufacturer::where('_id', $manufacturer_id)->first();
        $manufacturer_name = $manufacturer->name_manufact;
        return $manufacturer_name;
    }

    public function search($name): Collection
    {
        $data = $this->model->newModelQuery()->where('name', 'like', '%' . $name . '%')->get();
        $convertedModels = $data->map(function ($model) {
            return $model->convertToDomain();
        });
        return $convertedModels;
    }

    public function getCategoryById($id_cate)
    {
        $data = $this->model->newModelQuery()->where('id_cate', $id_cate)->get();
        $convertedModels = $data->map(function ($model) {
            return $model->convertToDomain();
        });
        return $convertedModels;
    }

    public function getManufactureById($id_manu)
    {
        $data = $this->model->newModelQuery()->where('id_manufact', $id_manu)->get();
        $convertedModels = $data->map(function ($model) {
            return $model->convertToDomain();
        });
        return $convertedModels;
    }

}
