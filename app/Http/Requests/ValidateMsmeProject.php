<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMsmeProject extends FormRequest
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
            'application_id' => ['required', 'min:1'],
            'solution_type' => ['required', 'string'],
            'name' => ['required', 'string', 'min:1'],
            'description' => ['required', 'string', 'max:2048'],
        ];
    }
}
