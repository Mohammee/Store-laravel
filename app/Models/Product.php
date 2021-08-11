<?php

namespace App\Models;

use App\Traits\Imageable;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Translatable , Imageable;

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        )->withTimestamps();
    }


    public function brands()
    {
        return $this->belongsToMany(
            Brand::class ,
            'brand_product' ,
            'product_id' ,
            'brand_id'
        );
    }


}
