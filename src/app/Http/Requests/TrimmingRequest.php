<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrimmingRequest extends FormRequest
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
            ' model' => 'required|regex:/\A([a-zA-Z0-9-])+\z/u',
            'number_of_sheets' => 'required|regex:/\A([a-zA-Z0-9-])+\z/u',

        ];
    }
    public function messages()
    {
        return [
            'h_no.required' => 'modelは必須です',
            'h_no.regex' => 'modelは半角文字記入してください',
            'number_of_sheets.required' => '枚数は必須です',
            'number_of_sheets.regex' => '枚数は半角文字記入してください',
        ];
    }
}
