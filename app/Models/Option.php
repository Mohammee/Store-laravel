<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory , Translatable;

    protected $fillable = [
        'status',
        'must_select',
        'type'
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'id'
        );
    }

    public function optionValues()
    {
        return $this->hasMany(
            OptionValue::class,
            'option_id',
            'id');
    }
}
