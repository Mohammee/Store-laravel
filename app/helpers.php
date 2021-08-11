<?php

use App\Models\Category;

if(! function_exists('formatDate'))
 {
     function formatDate($data)
     {
         return $data->format('Y-m-d');
     }
 }

 if( ! function_exists('storeImage'))
 {
     function uploadImage($image , $imageDirectoryName)
     {
         $distination = "uploads/admin/$imageDirectoryName/";
         $extention = $image->getClientOriginalExtension();

         $image_name = pathinfo($image->getClientOriginalName() , PATHINFO_FILENAME) . '-' . time() . '.' . $extention;
         $image_path = $distination . $image_name;

         $image =  Image::make($image->getRealPath());
         $image->save($image_path);

         return $image_path;
     }
 }

  if( ! function_exists('getLocal'))
  {
      function getLocal()
      {
          return config('app.locale');
      }
  }

//  if( ! function_exists('formatNumber'))
//  {
//      function formatNumber($number)
//      {
//          return number_format($number ,2 ,'.');
//      }
//  }

if(! function_exists('getContent'))
{
    function getContent($contetn_json)
    {
        $content = json_decode($contetn_json , true);

        return collect($content);

    }
}

if(! function_exists('getLanguagesId'))
{
    function getLanguagesId()
    {
         return \App\Models\Language::orderBy('id')->pluck('id')->toArray();
    }
}

if( ! function_exists('getCategories'))
{
    function getCategories()
    {
        $categories = Category::where([
            'parent_id' => 0,
            'status' => 1
        ])
            ->whereHas('products')
            ->withCount('products')
            ->with([
                'translation', 'childCategories.translation',
                'childCategories.childCategories.translation',
                'childCategories.childCategories.childCategories.translation'
            ])->get();

        return $categories;
    }
}

if(! function_exists('divideText'))
{
    function divideText($text , $limit = 4)
    {
        if(str_word_count($text) > $limit) {
            $divide_arr = explode(' ', $text);

            $new_str = '';

            for ($i = 0; $i < count($divide_arr); $i++) {
                $new_str .= $divide_arr[$i] . ' ';
                if (($i + 1) % 4 == 0) {
                    $new_str .= '<br>';
                }
            }

            return trim($new_str);
        }

        return  $text;

    }
}

if( ! function_exists('getVariantName'))
{
    function getVariantName($variant)
    {
        $name = '';

        if(! empty($variant['color_id']))
        {
        $name = \App\Models\Color::find($variant['color_id'])->name . '-';
        }

        if(! empty($variant['option_ids']))
        {
            foreach($variant['option_ids'] as $id)
            {
                $name .= \App\Models\OptionValue::find($id)->name . '-';
            }
        }


        return trim($name , '-');
    }
}

if( ! function_exists('getOptionValues'))
{
    function getOptionValues($option_values)
    {
        return implode('-' , $option_values);
    }
}
