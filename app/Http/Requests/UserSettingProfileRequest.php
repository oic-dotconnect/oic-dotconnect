<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserSettingProfileRequest extends Request
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
            'introduction' => 'max:200'
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'ニックネームは必須項目です。',
        'name.max' => 'ニックネームは20文字以下で入力してください。',
        'introduction.max' => '紹介文は200文字以下で入力してください。'
        ];
    }
}
