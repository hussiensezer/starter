<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_en' => 'required|max:100|unique:offers,name_en',
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'price_en' => 'required|numeric',
            'price_ar' => 'required|numeric',
            'details_en' => 'required|min:5|max:100',
            'details_ar' => 'required|min:5|max:100',
        ];
    }

    public function messages() {
        return
            [
//            'name.required' => 'يجب ان يكون الحقل مملو'
            ];
    }
}
