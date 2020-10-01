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
            "teacher_name"=>'required',
            "teacher_email"=>'required',
            "teacher_password"=>'required|min:8',
            "teacher_phone"=>'required',
            "teacher_designation_name"=>'required',
            "department_name"=>'required',
            "gender_name"=>'required',
            "teacher_image"=>'mimes:png,jpg,jpeg',
        ];
    }
}
 