<?php

namespace App\Traits;

use App\Models\Language;
use App\Models\Translation;

trait Translatable
{

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function translation($lang_id = null)
    {
        $lang_id = $lang_id ?? Language::getLocalId();

        return $this->morphOne(Translation::class, 'translatable')
            ->where('lang_id', $lang_id);
    }

    /**================================================================================
     * ===============   Delete all translations where delete model  ===================
     * ================================================================================
     * bootMyTrait() as static and initializeMyTrait()  non-static
     **/

    public static function bootTranslatable()
    {
        self::deleting(function ($item) {
            $item->translations()->delete();
        });
    }


    /**============================================================================
     * ===============   function to get attribte for languges  ===================
     * ============================================================================
     * where use with('translation') it use this relation not open new relation its cool
     **/

    public function transId($lang_id)
    {

        return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->id;

    }

    public function name($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->name;
        }

        return $this->name;
    }

    public function url($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->url;
        }

        return $this->url;
    }

    public function description($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->description;
        }

        return $this->description;
    }

    public function meta_description($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->meta_description;
        }

        return $this->meta_description;
    }

    public function meta_title($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->meta_title;
        }

        return $this->meta_title;
    }

    public function meta_keywords($lang_id = null)
    {
        if ($lang_id != null) {
            return optional($this->translation($lang_id)->firstWhere('lang_id', $lang_id))->meta_keywords;
        }

        return $this->meta_keywords;
    }

    /**==========================================================
     * ===============   Mutators Attribute   ===================
     * ==========================================================
     * when use with('translation') it use this relation not open new relation its cool
     **/

    public function getNameAttribute()
    {
        return optional($this->translation)->name;
    }

    public function getUrlAttribute()
    {
        return optional($this->translation)->url;
    }

    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description;
    }

    //use Mutatot as MetaDescrition => meta_descrition
    public function getMetaDescriptionAttribute()
    {
        return optional($this->translation)->meta_description;
    }

    public function getMetaTitleAttribute()
    {
        return optional($this->translation)->meta_title;
    }

    public function getMetaKeywordsAttribute()
    {
        return optional($this->translation)->meta_keywords;
    }

// update or create update column or merge two array and create new item
    public function udaeteOrCreateTranslate($translate_data)
    {
        foreach (getLanguagesId() as $lang_id) {
            $this->translations()->updateOrCreate(
                [
//                    'translatable_id' => $this->id,
//                    'translatable_type' => self::class,
                    'lang_id' => $lang_id],
                [
                    'name' => key_exists('name' , $translate_data) ? ($translate_data['name'][$lang_id] ?? null) : null,
                    'url' => key_exists('url' , $translate_data) ? ($translate_data['url'][$lang_id] ?? null) : null,
                    'description' => key_exists('description' , $translate_data) ? ($translate_data['description'][$lang_id] ?? null) : null,
                    'meta_description' => array_key_exists('meta_description', $translate_data) ? ($translate_data['meta_description'][$lang_id] ?? null) : null,
                    'meta_title' => array_key_exists('meta_title', $translate_data) ? ($translate_data['meta_title'][$lang_id] ?? null) : null,
                    'meta_keywords' => array_key_exists('meta_keywords', $translate_data) ? ($translate_data['meta_keywords'][$lang_id] ?? null) : null,
                ]
            );
        }
    }


    public function scopeFilterName($query , array $fillters)
    {
       $query->whereHas('translation' , function ($query) use ($fillters) {
          $query->when($fillters['name'] ?? false , fn ($q) => $q
              ->where('name' , 'like' , '%' . $fillters['name'] . '%')
          );
       });
    }


    public function scopeFilterUrl($query , array $fillters)
    {
        $query->whereHas('translation' , function ($query) use ($fillters) {
            $query->when($fillters['url'] ?? false , fn ($q) => $q
                ->where('url' , $fillters['url'])
            );
        });
    }


}
