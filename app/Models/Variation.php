<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'option_values',
        'color_id'
    ];

    //only with fill and new object() not work with update or create
//    protected $casts = [
//      'option_values' => 'array'
//    ];


    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id'
        );
    }


    public function getOptionValuesAttribute($value)
    {
        return json_decode($value ,true);
    }

    public function setOptionValuesAttribute($value)
    {
        $this->attributes['option_values'] = json_encode($value);
    }
}
