<?php

namespace App\Http\Requests\Admin;

use App\Models\Option;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name.*' => 'required|max:255|string|regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui'
        ];
    }


    public function persist(Option $option)
    {
        $option->save();

        $option->udaeteOrCreateTranslate([
            'name' => $this->name
        ]);
    }
}
