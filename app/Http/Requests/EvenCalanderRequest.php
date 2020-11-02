<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenCalanderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'event_title' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'event_title.required' => 'This Field is Required',
            'event_start_date.required' => 'This Field is Required',
            'event_end_date.required' => 'This Field is Required',
        ];
    }
}
