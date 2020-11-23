<?php

namespace App\Http\Requests;

use App\Rules\OldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
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
            'password'       => new OldPassword(),
            'new_password'       => 'required|min:8',
            'retype_password' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'   => 'User Name Filed is required',
            'name.unique'         => 'User Name is taken',
            'profile_photo.mimes' => 'Photo type png, jpg, jpeg is validate for this application',

        ];
    }
}
