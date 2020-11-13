<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'address' =>'required',
            'latitude' =>'required|regex:/^\d+(\.\d{1,9})?$/',
            'longtitude' => 'required|regex:/^\d+(\.\d{1,9})?$/',

        ];
    }
}
