<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Manufacturer_collection extends Model
{
    protected $collection = 'Manufacturer_collection';
    protected $fillable =
        [
            'name_manufact',
        ];

    public function product_collection()
    {
        return $this->embedsMany(Product_collection::class);
    }
    use HasFactory;
}
