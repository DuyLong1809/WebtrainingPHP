<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Manufacturer extends Model
{
    protected $collection = 'Manufacturer_collection';
    protected $fillable = [
        'name_manufact',
    ];

    public function product_collection()
    {
        return $this->embedsMany(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_manufact');
    }

    use HasFactory;
}
