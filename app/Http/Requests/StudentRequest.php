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
        return [
            "student_admission_number"=>'required',
            "student_roll_number"=>'required',
            "class_name"=>'required',
            "section_name"=>'required',
            "student_name"=>'required',
        ];
    }
}
