<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product_collection extends Model
{
    protected $collection = 'product_collection';
    protected $fillable =
        [
            'name',
            'id_cate',
            'id_manufact',
            'image',
            'price',
            'mota',
        ];

    public function category()
    {
        return $this->belongsTo(Category_collection::class, 'id_cate');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer_collection::class, 'id_manufact');
    }


    public function category_collection()
    {
        return $this->embedsOne(Category_collection::class, 'category_collection');
    }

    public function manufacturer_collection()
    {
        return $this->embedsOne(Manufacturer_collection::class, 'id_manufact');
    }

    public function img_slides()
    {
        return $this->embedsMany(Img_slide_collection::class);
    }

    public function convertToDomainAll(): array
    {
        $products = $this->all();
//        $products = $this->with('category')->get();

        $productDomains = [];

        foreach ($products as $product) {
//            dd($products, $product->category->name_cate);

            $productDomain = new ProductDomain(
                $product->id,
                $product->name,
                $product->price,
                $product->image,
                $product->mota,
                $product->id_cate,
                $product->id_manufact,
            );
            $productDomains[] = $productDomain;
        }

//        return new ProductDomain($productDomains);
        return $productDomains;
    }
    public function convertToDomain()
    {
//        dd($this->category);
        $model = new ProductDomain(
            $this->id,
            $this->name,
            $this->price,
            $this->image,
            $this->mota,
            $this->id_cate,
            $this->id_manufact,
        );
        return $model;
    }

    public function convertToDomainDetail()
    {
        $model = new ProductDetailDomain(
            $this->id,
            $this->name,
            $this->price,
            $this->image,
            $this->mota,
            $this->category->name_cate,
            $this->manufacturer->name_manufact,
        );
        return $model;
    }

    use HasFactory;
}
