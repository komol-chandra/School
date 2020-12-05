<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'attendance_date' => 'required|date_format:Y-m-d',
            'class_name' => 'required',
            'section_name' => 'required',
            'student_name' => 'required',
            'attendance_status' => 'required',
        ];
    }
}
