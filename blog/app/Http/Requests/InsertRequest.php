<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
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
            'last_name' => 'required|max:15|alpha',
            'first_name' => 'required|max:15|alpha',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Поле email является обязательным',
            'first_name.required' => 'Поле тема является обязательным',
        ];
    }
}
