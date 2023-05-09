<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
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

    public function hangsanxuat()
    {
        return $this->belongsTo(Hangsanxuat::class, 'id_manufact');
    }

    public function img_slides()
    {
        return $this->hasMany(Img_slide::class);
    }
}
