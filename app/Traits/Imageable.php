<?php

namespace App\Traits;

use App\Models\Image;

Trait Imageable{


    public function images()
    {
        return $this->morphMany(Image::class , 'imageable');
    }
}
