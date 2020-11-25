<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageSliderRequest extends FormRequest
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
            "slider1_img" => 'mimes:png,jpg,jpeg,webp',
            "slider2_img" => 'mimes:png,jpg,jpeg,webp',
            "slider3_img" => 'mimes:png,jpg,jpeg,webp',
        ];
    }
}
