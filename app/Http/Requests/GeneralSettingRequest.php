<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
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
            "website_title"   => 'required',
            "copy_right_text" => 'required',
            "header_logo"     => 'mimes:png,jpg,jpeg,webp',
            "footer_logo"     => 'mimes:png,jpg,jpeg,webp',
        ];
    }
}
