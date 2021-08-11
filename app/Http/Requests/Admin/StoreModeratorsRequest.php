<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreModeratorsRequest extends FormRequest
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
            'name' => ['required' , 'regex:/^[a-zA-Z_\p{Arabic}\p{N} ]+\b/ui' , 'string' , 'min:3' , 'max:255'],
            'role_id' => 'required|exists:App\Models\Role,id',
            'email' => 'required|email|string|max:255|unique:admins' ,
            'mobile' => 'required|numeric|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

}
