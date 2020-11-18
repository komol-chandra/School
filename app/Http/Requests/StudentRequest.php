<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $student = $this->route('student');
        return [
            "student_roll_number"   => 'required |unique:students,student_roll_number,' . $student . ',student_id',
            "class_name"            => 'required',
            "section_name"          => 'required',
            "student_name"          => 'required',
            "email"                 => 'required',
            "password"              => 'required',
            "gender_name"           => 'required',
            "blood_name"            => 'required',
            "guardian_email"        => 'required ',
            "guardian_pass"         => 'required',
            "student_guardian_name" => 'required',
        ];
    }
    public function messages()
    {
        return [
            'student_roll_number.required'   => 'Student roll number is required',
            'class_name.required'            => 'Class is required',
            'section_name.required'          => 'Section is required',
            'student_name.required'          => 'Student Name is required',
            'email.required'                 => 'Student Email is required',
            'password.required'              => 'Student Email Password is required',
            'gender_name.required'           => 'Student Gender is required',
            'blood_name.required'            => 'Student Blood Name is required',
            'guardian_email.required'        => 'Guardian Email is required',
            'guardian_pass.required'         => 'Guardian Password is required',
            'student_guardian_name.required' => 'Guardian Name is required',
        ];
    }
}
