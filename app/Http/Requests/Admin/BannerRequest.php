<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd($this->all());
        $rules =  [
            'name.*' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'],
            'description.*' => 'nullable|string|min:3|max:255',
            'position' => 'required|numeric|regex:/^(?:\+)?[\p{N}]+\b/s',
             'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'background' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        if($banner = $this->banner)
        {
            $rules['url.1'] = ['required', 'string', 'min:2', 'max:255', 'unique:translations,url,' . $banner->transId(1)];
            $rules['url.2'] = ['required', 'string', 'min:2', 'max:255', 'unique:translations,url,' . $banner->transId(2)];
        } else {
            $rules['url.*'] = 'required|string|unique:translations,url|min:2|max:255';
        }

        return $rules;
    }


    public function presist(Banner $banner)
    {
        $banner->status = $this->has('status') ? 1 : 0;
        $banner->show_title = $this->has('show_title') ? 1 : 0;
        $banner->show_description = $this->has('show_description') ? 1 : 0;
        $banner->position = $this->position;

        if($this->hasFile('image'))
        {
            $image = $this->image;
            if($image->isValid())
            {
                $path = uploadImage($image , 'banners');
                $banner->image = $path;
            }
        }

        if($this->hasFile('background'))
        {
            $background = $this->background;
            if($background->isValid())
            {
                $path = uploadImage($background , 'banners');
                $banner->background = $path;
            }
        }

        $banner->save();

        $banner->udaeteOrCreateTranslate([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
        ]);
    }
}
