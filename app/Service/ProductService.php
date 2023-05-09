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
    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
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
    public function UpdateProduct(UpdateProductRequest $request ,$id)
    {
        $data['name'] = $request['name'];
        $data['id_cate'] = $request['id_cate'];
        $data['id_manufact'] = $request['id_manufact'];
        $data['price'] = $request['price'];
        $data['mota'] = $request['mota'];
//-----------Xử Lý Ảnh------------------
        $product = $this->productRepository->getProductById($id);
        if (isset($request['image'])) {
            $img =public_path('/images/'.$product->image);
            if($img){
                unlink($img);
            }
            $file = $request['image'];
            $extension = $file->getClientOriginalExtension();
            $imageName = rand(0,999) . '.' . $extension;
            $image = $file->move(public_path('images'), $imageName);
            $data['image'] = $image->getBasename();
        } else {
            $data['image'] = $product->image;
        }

//--------------------------------------
        return $this->productRepository->update($id, $data);
    }
    public function UpdateImgSlide($id, Request $request)
    {
        if($request->hasFile('image_slide')){
            foreach ($request['image_slide'] as $key => $value){
                $idImgSlider = $request['idImgSlider'];
                $idImg = $idImgSlider[$key];
                if($idImg){
                    $file = $value;
                    $extension = $file->getClientOriginalExtension();
                    $imageName = rand(0,999) . '.' . $extension;
                    $image = $file->move(public_path('image_slide'), $imageName);
                    $item_img = $image->getBasename();
                    $data_slide = [
                        'name_imgslide'=>$item_img,
                    ];
                    $img_product = $this->img_slide->find($idImg);
                    $img_product->update($data_slide);
                }else{
                    $file = $value;
                    $extension = $file->getClientOriginalExtension();
                    $imageName = rand(0,999) . '.' . $extension;
                    $image = $file->move(public_path('image_slide'), $imageName);
                    $item_img = $image->getBasename();
                    $data_slide = [
                        'name_imgslide'=>$item_img,
                        'id_product'=> $id,
                    ];
                    $this->img_slide->create($data_slide);
                }
            }
        }

        if(isset($request['idImageDelete'])){
            foreach ($request['idImageDelete'] as $del_img){
                if ($del_img) {
                    $product = $this->img_slide->find($del_img);
                    $image_slide = public_path('/image_slide/' . $product->name_imgslide);
                    unlink($image_slide);
                    $del = $this->img_slide->destroy($del_img);
                }
            }
        }
    }
}
