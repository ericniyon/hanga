<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ValidatePasswordRegistration extends FormRequest
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
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                Password::min(6),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'password.regex' => 'Password must be at least 8 characters(a-z) with at least one special(!#$..) , one digit(0-9) and one capital letter(A-Z).'
        ];
    }
}
