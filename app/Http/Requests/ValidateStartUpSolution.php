<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStartUpSolution extends FormRequest
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
            // 'client_id' => ['required', 'string'],
            'solution_type' => 'required',
            'solution_status' => 'required',
            'name' => ['required', 'string', 'min:1'],
            'description' => ['required', 'string', 'max:200'],
            'capacity' => ['required', 'string'],
            'active_users' => ['required', 'string'],
            // 'product_link' => ['nullable'],
        ];
    }
}
