<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelerRequest extends FormRequest
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
            'number_of_sheets' => 'required|regex:/\A([a-zA-Z0-9-])+\z/u',
        ];
    }
    public function messages()
    {
        return [
            'number_of_sheets.required' => '枚数は必須です',
            'number_of_sheets.regex' => '枚数は半角文字記入してください',
            
        ];
    }
}
