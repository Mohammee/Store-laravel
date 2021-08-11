<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory , Translatable;

    protected $fillable = [
      'image' ,
        'background' ,
        'status' ,
        'show_title' ,
        'show_description',
        'position',
        'start_date',
        'end_date'
    ];
}
