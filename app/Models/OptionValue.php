<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory , Translatable;

    protected $fillable = [
         'option_id'
    ];

    public function option()
    {
        return $this->belongsTo(
            Option::class ,
            'option_id',
            'id'
        );
    }
}
