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
            "student_roll_number"       => 'required |unique:students,student_roll_number,' . $student . ',student_id',
            "class_name"                => 'required',
            "section_name"              => 'required',
            "student_name"              => 'required',
            "email"                     => 'required',
            "password"                  => 'required',
            "gender_name"               => 'required',
            "blood_name"                => 'required',
            "guardian_email"            => 'required ',
            "guardian_pass"             => 'required',
            "student_guardian_name"     => 'required',
            "profile_photo"             => 'mimes:png,jpg,jpeg',
            "student_birth_certificate" => 'mimes:png,jpg,jpeg',
            "guardian_image"            => 'mimes:png,jpg,jpeg',
            "student_guardian_idcard"   => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            "student_admission_number"        => 'required',
            "student_roll_number"             => 'required',
            "class_name"                      => 'required',
            "section_name"                    => 'required',
            "student_name"                    => 'required',
            'student_roll_number.required'    => 'Student roll number is required',
            'class_name.required'             => 'Class is required',
            'section_name.required'           => 'Section is required',
            'student_name.required'           => 'Student Name is required',
            'email.required'                  => 'Student Email is required',
            'password.required'               => 'Student Email Password is required',
            'gender_name.required'            => 'Student Gender is required',
            'blood_name.required'             => 'Student Blood Name is required',
            'guardian_email.required'         => 'Guardian Email is required',
            'guardian_pass.required'          => 'Guardian Password is required',
            'student_guardian_name.required'  => 'Guardian Name is required',
            'profile_photo.mimes'             => 'Student profile photo need png, jpg, jpeg extension',
            'student_birth_certificate.mimes' => 'Student Birth Certificate photo need png, jpg, jpeg extension',
            'guardian_image.mimes'            => 'guardian profile photo need png, jpg, jpeg extension',
            'student_guardian_idcard.mimes'   => 'this photo need png, jpg, jpeg extension',
        ];
    }
}
