<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $collection = 'product_collection';
    protected $fillable = [
        'name',
        'id_cate',
        'id_manufact',
        'image',
        'price',
        'mota',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_cate');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'id_manufact');
    }


    public function category_collection()
    {
        return $this->embedsOne(Category::class, 'category_collection');
    }

    public function manufacturer_collection()
    {
        return $this->embedsOne(Manufacturer::class, 'id_manufact');
    }

    public function convertToDomain()
    {
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
