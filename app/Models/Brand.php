<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory , Translatable;

    protected $fillable = ['image' , 'status'];


    public function products()
    {
        return $this->belongsToMany(Product::class ,
            'brand_product' ,'brand_id' , 'product_id');
    }
}
