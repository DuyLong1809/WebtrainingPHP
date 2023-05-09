<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements Interface\ProductRepositoryInterface
{
    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function all()
    {
        return $this->productModel->all();
    }
    public function getProductById($id)
    {
        return $this->productModel->findOrFail($id);
    }
    public function createProduct(array $data)
    {
        return $this->productModel->create($data);
    }
    public function update($id, array $data)
    {
        $find_id = $this->productModel->findOrFail($id);
        $product_update = $find_id->update($data);
        return $product_update;
    }
    public function delete($id)
    {
        return $this->productModel->destroy($id);
    }
    public function search($name)
    {
        return $this->productModel->where('name','like','%'.$name.'%')->get();
    }
    public function getCategoryById($id_cate)
    {
        $product =  $this->productModel->where('id_cate', $id_cate)->get();
        return $product;
    }
    public function getManufactureById($id_manu)
    {
        $product =  $this->productModel->where('id_manufact', $id_manu)->get();
        return $product;
    }
}
