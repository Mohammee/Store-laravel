<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class ProductRequest extends FormRequest
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

        //to validte select array list[] for each select put the name of array only
        $rules = [
            'name.*' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'],
//           'url.*' => 'required|string|unique:translations,url|min:2|max:255',
            'description.*' => 'nullable|string|min:3|max:255',
            'main_price' => 'required|numeric',
            'categories' => ['required', 'exists:App\Models\Category,id'],
            'brands' => ['required', 'exists:App\Models\Brand,id'],
            'quantity' => 'required|numeric|regex:/^(?:\+)?[\p{N}]+\b/s',
            'main_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vedio' => 'nullable|string|min:3|max:255',
            'meta_description.*' => 'nullable|string|min:3|max:255',
            'meta_title.*' => 'nullable|string|min:3|max:255',
            'meta_keywords.*' => 'nullable|string|min:3|max:255',
            'variations.*.color_id' => 'nullable|exists:App\Models\Color,id',
            'variations.*.option_values' => 'nullable|string|regex:/^[1-9]?[-1-9]*[1-9]$/',
            'variations.*.stock' => 'required|numeric|regex:/^(?:\+)?[\p{N}]+\b/s',
            'variations.*.price' => 'required|numeric'
        ];


        if ($product = $this->product) {
            $rules['url.1'] = ['required', 'string', 'min:2', 'max:255', 'unique:translations,url,' . $product->transId(1)];
            $rules['url.2'] = ['required', 'string', 'min:2', 'max:255', 'unique:translations,url,' . $product->transId(2)];
        } else {
            $rules['url.*'] = 'required|string|unique:translations,url|min:2|max:255';
        }

        return $rules;

    }

    public function presist(Product $product)
    {
//        dd($this->all());
        $product->price = $this->main_price;
        $product->quantity = $this->quantity;
        $product->views = 0;
        $product->vedio = $this->filled('vedio') ? $this->vedio : null;
        $product->status = $this->has('status') ? 1 : 0;
        $product->free_shipping = $this->has('free_shipping') ? 1 : 0;
        $product->featured = $this->has('featured') ? 1 : 0;


        if ($this->hasFile('main_image')) {
            $image = $this->main_image;
            if ($image->isValid()) {

//                $imageName = $image->getClientOriginalName();
//                $imageName = pathInfo($imageName, PATHINFO_FILENAME);
//
//                $imageExtention = $image->getClientOriginalExtension();
//                $imageName = $imageName . '-' . time() . '.' . $imageExtention;
//
//                $distinations = 'uploads/admin/product_images/';
//
//                Image::make($image)->resize(1040, 1200)->save($distinations . 'large/' . $imageName);
//                Image::make($image)->resize(520, 400)->save($distinations . 'medium/' . $imageName);
//                Image::make($image)->resize(260, 300)->save($distinations . 'small/' . $imageName);
//
//                $product->main_image = $imageName;

                $path = uploadImage($image, 'product_images');
                $product->main_image = $path;
            }
        }


        if ($this->hasFile('images')) {
            $images = $this->file('images');

            foreach ($images as $image) {
                if ($image->isValid()) {
                    $path = uploadImage($image, 'product_images');
                    $product->images()->create([
                        'src' => $path
                    ]);
                }
            }
        }

        $product->save();

        $product->categories()->sync($this->categories);
        $product->brands()->sync($this->brands);

        $product->udaeteOrCreateTranslate([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'meta_description' => $this->meta_description,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
        ]);


        if ($this->filled('variations')) {

            if($product->variations->isNotEmpty())
            {
                $product->variations()->delete();
            }

            foreach ($this->variations as $variant) {

                if(!empty($variant['option_values']))
                {
                   $variant['option_values'] = explode('-' , $variant['option_values']);
                }else{
                    $variant['option_values'] = null;
                }

               $product->variations()->create([
                   'color_id' => $variant['color_id'],
                        'option_values' => $variant['option_values'],
                        'price' => $variant['price'],
                        'stock' => $variant['stock'] ,
                        'sku' => $variant['sku']
                   ]);

            }
        }


    }
}
