<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements Interface\ProductRepositoryInterface
{
    protected Product $productmodel;
    public function __construct(Product $productmodel)
    {
        $this->model = $productmodel;
    }
    public function search($name)
    {
        return $this->model->newModelQuery()->where('name', 'like', '%' . $name . '%')->get();
    }
    public function getCategoryById($id_cate)
    {
        return $this->model->newModelQuery()->where('id_cate', $id_cate)->get();
    }
    public function getManufactureById($id_manu)
    {
        return $this->model->newModelQuery()->where('id_manufact', $id_manu)->get();
    }
}
