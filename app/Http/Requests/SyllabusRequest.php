<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyllabusRequest extends FormRequest
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
            "syllabus_title_name"=>'required',
            "class_name"=>'required',
            "section_name"=>'required',
            "subject_name"=>'required',
            "syllabus_image"=>'mimes:png,jpg,jpeg',
        ];
    }
}
