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
}
