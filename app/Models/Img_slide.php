<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img_slide extends Model
{
    use HasFactory;

    protected $table = '_img_slide';

    protected $fillable =
        [
            'name_imgslide',
            'id_product',
        ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
