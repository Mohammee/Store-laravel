<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'url' , 'description' ,
        'meta_description' , 'meta_title' , 'meta_keywords' , 'lang_id'];

    public function translatable()
    {
        return $this->morphTo();
    }

}
