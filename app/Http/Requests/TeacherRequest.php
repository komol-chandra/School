<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            "teacher_name"             => 'required',
            "teacher_phone"            => 'required',
            "teacher_designation_name" => 'required',
            "department_name"          => 'required',
            "gender_name"              => 'required',
            "teacher_image"            => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            "teacher_name"             => 'teacher name required',
            "teacher_phone"            => 'teacher phone required',
            "teacher_designation_name" => 'teacher designation name required',
            "department_name"          => 'department required',
            "gender_name"              => 'gender required',
            'teacher_image.mimes'      => 'this photo need png, jpg, jpeg extension',
        ];
    }
}
