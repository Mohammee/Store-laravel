<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;
use Intervention\Image\Facades\Image;

class StoreUpdateCategoryRequest extends FormRequest
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
        $rules = [
            'name.*' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'],
//            'url.*' => 'required|string|unique:translations,url|min:2|max:255',
            'description.*' => 'nullable|string|min:3|max:255',
            'parent_id' => ['nullable', 'numeric', 'exists:App\Models\Category,id'],
            'discount' => ['nullable', 'numeric', 'regex:/^\p{N}+(.\p{N}+)?\b/ui'],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_description.*' => 'nullable|string|min:3|max:255',
            'meta_title.*' => 'nullable|string|min:3|max:255',
            'meta_keywords.*' => 'nullable|string|min:3|max:255',

        ];

        // use $this->category
        if ($category = $this->category) {
            $rules['url.1'] = ['required', 'string', 'unique:translations,url,' . $category->transId(1)];
            $rules['url.2'] = ['required', 'string', 'unique:translations,url,' . $category->transId(2)];
        } else {
            $rules['url.*'] = 'required|string|unique:translations,url|min:2|max:255';

        }

//        dd($rules);
        return $rules;
    }


    public function presist(Category $category)
    {

        $category->parent_id = $this->filled('parent_id') ? $this->parent_id : 0;
        $category->status = $this->has('status') ? 1 : 0;
        $category->show_in_main = $this->has('show_in_main') ? 1 : 0;
        $category->discount = $this->filled('discount') ? round($this->discount, 2) : 0;

        if ($this->hasFile('image')) {
            $image = $this->image;
            if ($image->isValid()) {
//                $path = uploadImage($image, 'category_image');
                $destination = 'uploads/admin/category_image/';
                $extention = $image->getClientOriginalExtension();
                $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $extention;

                $image_path = $destination . $image_name;
                Image::make($image->getRealPath())
                    ->resize(600, 370)
                    ->save( $image_path);

                $category->image =  $image_path;
            }
        }

        $category->save();

        $category->udaeteOrCreateTranslate([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'meta_description' => $this->meta_description,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
        ]);


    }
}
