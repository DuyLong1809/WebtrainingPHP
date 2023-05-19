<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class Category_collection extends Model
{
    protected $collection = 'Category_collection';
    protected $fillable =
        [
            'name_cate',
        ];

    public function products()
    {
        return $this->hasMany(Product_collection::class, 'id_cate');
    }

//    public function product_collection()
//    {
//        return $this->embedsMany(Product_collection::class, 'product_collection');
//    }
    use HasFactory;
}
