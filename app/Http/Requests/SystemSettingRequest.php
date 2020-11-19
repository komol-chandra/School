<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemSettingRequest extends FormRequest
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
            "system_name"  => 'required',
            "footer_text"  => 'required',
            "regular_logo" => 'mimes:png,jpg,jpeg,webp',
            "light_logo"   => 'mimes:png,jpg,jpeg,webp',
            "small_logo"   => 'mimes:png,jpg,jpeg,webp',
            "fav_icon"     => 'mimes:png,jpg,jpeg,webp',
        ];
    }
}
