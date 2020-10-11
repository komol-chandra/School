<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassNameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'class_name' => 'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'class_name.required' => 'This Field is Required',
            'class_name.min' => 'Minimum 1+ Character required',
        ];
    }
}
