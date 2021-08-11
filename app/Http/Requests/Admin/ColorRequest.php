<?php

namespace App\Http\Requests\Admin;

use App\Models\Color;
use App\Models\Option;
use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
        return [
            'name.*' => 'required|max:255|string|regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui',
            'code' => ['required' , 'string' , 'max:255' , 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];
    }


    public function persist(Color $color)
    {
        $color->code = $this->code;
        $color->save();

        $color->udaeteOrCreateTranslate([
            'name' => $this->name
        ]);
    }
}
