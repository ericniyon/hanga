<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateDSPSolutionForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'dsp_name'=>'required',
             'website'=>'nullable|url',
            // 'phone '=>'required',
            // 'website '=>'required',
            // 'description '=>'required',
        ];
    }
}
