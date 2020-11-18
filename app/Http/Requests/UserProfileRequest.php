<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
        $data = $this->route('profile');
        return [
            "name"          => 'required |unique:users,name,' . $data . ',id',
            "profile_photo" => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'name.required'       => 'User Name Filed is required',
            'name.unique'         => 'User Name is taken',
            'profile_photo.mimes' => 'Photo type png, jpg, jpeg is validate for this application',

        ];
    }
}
