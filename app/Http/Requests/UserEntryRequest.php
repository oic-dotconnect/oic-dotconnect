<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEntryRequest extends Request
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
            'name' => 'required|max:20',
            'code' => 'required|regex:/^[a-zA-Z0-9_-]+$/|unique:USER,code|max:20',
            'introduction' => 'max:200'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'ニックネームは必須項目です。',
        'name.max' => 'ニックネームは20文字以下で入力してください。',
        'code.required'  => 'ユーザーコードは必須項目です。',
        'code.regex' => 'ユーザーコードは半角英数と「-」「_」以外使用できません。',
        'code.unique' => 'このユーザーコードはすでに使用されています。',
        'code.max' => 'ユーザーコードは7文字以下で入力してください。',
        'introduction.max' => '紹介文は200文字以下で入力してください。'
    ];
    }
}
