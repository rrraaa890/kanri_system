<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'h_no' => 'required|regex:/\A([a-zA-Z0-9-])+\z/u',
        ];
    }
    public function messages()
    {
        return [
            'h_no.required' => 'H/Noは必須です',
            'h_no.regex' => 'H/Noは半角文字記入してください',
            
        ];
    }
}
