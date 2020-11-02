<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            "staff_name"=>'required',
            "staff_email"=>'required',
            "staff_password"=>'required|min:8',
            "staff_phone"=>'required',
            "staff_designation_name"=>'required',
            "staff_department_name"=>'required',
            "gender_name"=>'required',
            "blood_name"=>'required',
            "staff_image"=>'mimes:png,jpg,jpeg',
        ];
    }
}
