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
}
