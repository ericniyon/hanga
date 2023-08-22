<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateAffiliation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth('client')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'employer_id' => [
                'required',
                Rule::unique('affiliations')
                    ->where(function ($query) {
                        return $query->where([
                            ['client_id', auth('client')->id()],
                        ]);
                    })->ignore(request('id'))
            ],
            'position' => ['required'],
            'description' => ['nullable', 'max:512']
        ];
    }

    public function messages(): array
    {
        return [
            'employer_id.unique' => 'The employer has already saved'
        ];
    }
}
