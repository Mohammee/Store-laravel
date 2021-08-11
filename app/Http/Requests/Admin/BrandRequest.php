<?php

namespace App\Http\Requests\Admin;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

class BrandRequest extends FormRequest
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
        $rules =  [
            'name.*' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'],
            'description.*' => 'nullable|string|min:3|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($brand = $this->brand) {
            $rules['url.1'] = ['required', 'string' , 'min:2' , 'max:255', 'unique:translations,url,' . $brand->transId(1)];
            $rules['url.2'] = ['required', 'string', 'min:2' , 'max:255', 'unique:translations,url,' . $brand->transId(2)];
        } else {
            $rules['url.*'] = 'required|string|unique:translations,url|min:2|max:255';

        }

        return  $rules;

    }


    public function presist(Brand $brand)
    {

        $brand->status = $this->has('status') ? 1 : 0;

        if ($this->hasFile('image')) {
            $image = $this->image;
            if ($image->isValid()) {
                $path = uploadImage($image, 'brand_image');
                $brand->image = $path;
            }
        }

        $brand->save();

        $brand->udaeteOrCreateTranslate([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
        ]);


    }
}
