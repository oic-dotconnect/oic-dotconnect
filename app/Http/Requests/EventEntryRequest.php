<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventEntryRequest extends Request
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
            'name' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return[
            'name.max' => 'タイトルは50文字以下で入力してください。',
            'name.required' => 'タイトルは必ず入力してください。',
        ];
    }
}
