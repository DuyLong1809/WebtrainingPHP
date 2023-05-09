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
    public function createProduct(ProductRequest $request)
    {
        $data['name'] = $request['name'];
        $data['id_cate'] = $request['id_cate'];
        $data['id_manufact'] = $request['id_manufact'];
        $data['price'] = $request['price'];
        $data['mota'] = $request['mota'];
//-----------Xử Lý Ảnh------------------
        $file = $request['image'];
        $extension = $file->getClientOriginalExtension();
        $imageName = rand(0,9999) . '.' . $extension;
        $image = $file->move(public_path('images'), $imageName);
        $data['image'] = $image->getBasename();
//--------------------------------------
        return $this->productRepository->createProduct($data);
    }
}
