<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProject extends FormRequest
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
            'name' => ['required'],
            'client_name' => ['required'],
            'application_id' => ['required', 'min:1'],
            'start_date' => ['required', 'date', 'before:today'],
            'end_date' => ['required', 'date', 'after:start_date', 'before_or_equal:today'],
            'description' => ['required', 'min:1', 'max:2048']
        ];
    }
}
