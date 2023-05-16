<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacture';
    protected $fillable =
        [
            'name_manufact',
        ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
