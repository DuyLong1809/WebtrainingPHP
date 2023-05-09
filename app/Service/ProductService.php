<?php

namespace App\Service;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Img_slide;
use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    protected $productRepository;
    protected $img_slide;

    protected $product;

    public function __construct(ProductRepositoryInterface $productRepository, Img_slide $img_slide, Product $product)
    {
        $this->productRepository = $productRepository;
        $this->img_slide = $img_slide;
        $this->product = $product;
    }
    public function getAllProduct()
    {
        return $this->productRepository->all();
    }
}
