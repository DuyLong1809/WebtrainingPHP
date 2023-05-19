<?php

namespace App\Repositories\MongoDB;

use App\Models\Category_collection;
use App\Models\Manufacturer_collection;
use App\Models\Product_collection;
use App\Models\ProductDetailDomain;
use App\Models\ProductDomain;
use App\Repositories\BaseRepository;
use App\Repositories\Interface;

class ProductCollectionRepository extends BaseRepository implements Interface\ProductRepositoryInterface
{
    public function __construct(Product_collection $productmodel)
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
    public function convertall(): array
    {
        return $this->model->convertToDomainAll();
    }
    public function findCateById($id)
    {
        $product_cate =  $this->model->find($id);
        $category_id = $product_cate->id_cate;
        $category = Category_collection::where('_id', $category_id)->first();
        $category_name = $category->name_cate;
        return $category_name;
    }

    public function findManuById($id)
    {
        $product_Manu =  $this->model->find($id);
        $manufacturer_id = $product_Manu->id_manufact;
        $manufacturer = Manufacturer_collection::where('_id', $manufacturer_id)->first();
        $manufacturer_name = $manufacturer->name_manufact;
        return $manufacturer_name;
    }

    public function search($name)
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
