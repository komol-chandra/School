<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoutineRequest extends FormRequest
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
            "class_name"=>'required',
            "section_name"=>'required',
            "subject_name"=>'required',
            "teacher_name"=>'required',
            "classroom_name"=>'required',
            "day_name"=>'required',
            "sh_hour"=>'required',
            "sm_minute"=>'required',
            "en_hour"=>'required',
            "em_minute"=>'required',
        ];
    }
}
