<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Img_slide_collection extends Model
{
    protected $collection = '_img_slide_collection';

    protected $fillable =
        [
            'name_imgslide',
            'id_product',
        ];

    public function Product()
    {
        return $this->embedsOne(Product_collection::class, 'id_product');
    }
    use HasFactory;
}
