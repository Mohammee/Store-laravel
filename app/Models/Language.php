<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public static function getLocalId()
    {
        return  cache()->remember('local' , 3600*24 , function () {
          return  Language::firstWhere('label' , config('app.locale'))->id;
        });
    }


    public function products()
    {
        return $this->hasMany(Product::class , 'lang_id' ,'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class , 'lang_id' ,'id');
    }

//    public function productInArabic()
//    {
//        return $this->products()->where('label' , 'ar');
//    }
//
//    public function productInEnglish()
//    {
//        return $this->products()->where('label' , 'en');
//    }
}
