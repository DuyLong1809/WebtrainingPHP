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
}
