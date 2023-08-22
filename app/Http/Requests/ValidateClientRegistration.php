<?php

namespace App\Http\Requests;

use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ValidateClientRegistration extends FormRequest
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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'max:100'],
            'email' => ['unique:clients', 'email', 'string', 'max:50'],
            'phone' => [
                'required',
                new ValidatePhoneNumber(),
                'unique:clients',
                'string',
                app()->environment('local') ? 'min:2' :
                    'regex:/^[0-9 ]+$/'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Phone number is invalid remove special characters (+-@$..)'
        ];
    }
}
