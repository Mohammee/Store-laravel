<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'status',
        'image',
        'parent_id',
        'discount',
        'show_in_main'
    ];

    public function scopeFilter($query , array $filters)
    {
       $query->when($filters['status'] ?? false, fn ($query) =>  $query
           ->where('status' , $filters['status'] == 1 ? 1 : 0 ));
    }

    // i use small latter because laravel return parent_category in camel case
    public function parentCategory()
    {
        return $this->belongsTo(
            self::class,
            'parent_id',
            'id'
        );
    }


    public function childCategories()
    {
        return $this->hasMany(
            self::class,
            'parent_id',
            'id'
        )->where('status' , 1)
            ->withCount('products');
//            ->select('id');
    }


    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'category_product',
            'category_id',
            'product_id'
        )->withTimestamps();
    }


    // strog work make strong code
    public function level()
    {
        $level = [];

        if ($this->parent_id > 0) {

            $parent = $this->parentCategory;
            $level = array_merge(
                $level,
                $parent->level()
            );

        }
        $level[] = $this->name;

        return $level;
    }

//    public function children()
//    {
//        $chidren = [] ;
//
//        $childCategoires = $this->childCategories;
//        if(count($childCategoires) > 0)
//        {
//            foreach($childCategoires as $child)
//            {
//                $chidren =
//            }
//        }
//    }

}
