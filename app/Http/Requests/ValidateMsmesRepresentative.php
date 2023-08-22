<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMsmesRepresentative extends FormRequest
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
            'representative_name' => 'required',
            'representative_email' => 'required',
            'representative_phone' => 'required',
            'representative_position' => 'required',
            'representative_gender' => 'required',
            'representative_physical_disability' => ['nullable'],
        ];
    }
}
