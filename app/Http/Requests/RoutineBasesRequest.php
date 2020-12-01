<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineBasesRequest extends FormRequest
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
            'class_name' => 'required',
            'section_name' => 'required',
            'day_name' => 'required',
            'period_name' => 'required',
            'teacher_name' => 'required',
            'subject_name' => 'required',
            'classroom_name' => 'required',
            'sarting_hour' => 'required',
            'ending_hour' => 'required',
            'duration' => 'required',
        ];
    }

    public function message()
    {
        return [
            'class_name.required' => 'Class Name Required',
        ];
    }
}
