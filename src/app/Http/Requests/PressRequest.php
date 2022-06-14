<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'good' => 'required|regex:/\A([a-zA-Z0-9-])+\z/u',
        ];
    }
    public function messages()
    {
        return [
            'good.required' => '良品は必須です',
            'good.regex' => '良品は半角文字記入してください',
            
        ];
    }
}
