<?php

namespace App\Repositories\Interface;

interface ProductRepositoryInterface
{
    public function all();
    public function getProductById($id);
    public function createProduct(array $data);
}
