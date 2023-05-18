<?php

namespace App\Service;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Img_slide;
use App\Models\Product;
use App\Repositories\Interface\Img_slideRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    protected $productRepository;
    protected $img_slideRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        Img_slideRepositoryInterface $img_slideRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->img_slideRepository = $img_slideRepository;
    }

    public function getAllProduct()
    {
        return $this->productRepository->convertall();
    }

    public function AllProduct()
    {
        return $this->productRepository->all();
    }


    public function getNameCateById($id)
    {
        return $this->productRepository->findCateById($id);
    }

    public function getNameManuById($id)
    {
        return $this->productRepository->findManuById($id);
    }

    public function getProductId($id)
    {
        return $this->productRepository->findById($id);
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
        $imageName = rand(0, 9999) . '.' . $extension;
        $image = $file->move(public_path('images'), $imageName);
        $data['image'] = $image->getBasename();
//--------------------------------------
        return $this->productRepository->create($data);
    }

    public function UpdateProduct(UpdateProductRequest $request, $id)
    {
        $data['name'] = $request['name'];
        $data['id_cate'] = $request['id_cate'];
        $data['id_manufact'] = $request['id_manufact'];
        $data['price'] = $request['price'];
        $data['mota'] = $request['mota'];
//-----------Xử Lý Ảnh------------------
        $product = $this->productRepository->findById($id);
        if (isset($request['image'])) {
            $img = public_path('/images/' . $product->getImage());
            if ($img) {
                unlink($img);
            }
            $file = $request['image'];
            $extension = $file->getClientOriginalExtension();
            $imageName = rand(0, 999) . '.' . $extension;
            $image = $file->move(public_path('images'), $imageName);
            $data['image'] = $image->getBasename();
        } else {
            $data['image'] = $product->getImage();
        }
//--------------------------------------
        return $this->productRepository->update($id, $data);
    }

    public function UpdateImgSlide($id, Request $request)
    {
        if ($request->hasFile('image_slide')) {
            foreach ($request['image_slide'] as $key => $value) {
                $idImgSlider = $request['idImgSlider'];
                $idImg = $idImgSlider[$key];
                if ($idImg) {
                    $extension = $value->getClientOriginalExtension();
                    $imageName = rand(0, 999) . '.' . $extension;
                    $image = $value->move(public_path('image_slide'), $imageName);
                    $item_img = $image->getBasename();
                    $data_slide = [
                        'name_imgslide' => $item_img,
                    ];
                    $img_product = $this->img_slideRepository->findById($idImg);
                    $img_product->update($data_slide);
                } else {
                    $extension = $value->getClientOriginalExtension();
                    $imageName = rand(0, 999) . '.' . $extension;
                    $image = $value->move(public_path('image_slide'), $imageName);
                    $item_img = $image->getBasename();
                    $data_slide = [
                        'name_imgslide' => $item_img,
                        'id_product' => $id,
                    ];
                    $this->img_slideRepository->create($data_slide);
                }
            }
        }

        if (isset($request['idImageDelete'])) {
            foreach ($request['idImageDelete'] as $del_img) {
                if ($del_img) {
                    $product = $this->img_slideRepository->findById($del_img);
                    $image_slide = public_path('/image_slide/' . $product->name_imgslide);
                    unlink($image_slide);
                    $del = $this->img_slideRepository->delete($del_img);
                }
            }
        }
    }

    public function DeleteProduct($id)
    {
        $product = $this->getProductId($id);
        $image = public_path('images/' . $product->getImage());
        if ($image) {
            unlink($image);
        }
        return $this->productRepository->delete($id);
    }

    public function SearchProduct($name)
    {
        return $this->productRepository->search($name);
    }

    public function getCategoryById($id_cate)
    {
        return $this->productRepository->getCategoryById($id_cate);
    }

    public function getManufactureById($id_manu)
    {
        return $this->productRepository->getManufactureById($id_manu);
    }
}
