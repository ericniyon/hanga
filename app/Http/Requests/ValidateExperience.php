<?php

namespace App\Http\Requests;

use App\FileManager;
use Illuminate\Foundation\Http\FormRequest;

class ValidateExperience extends FormRequest
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
            'iworker_registration_id' => ['required'],
            'client' => ['required', 'string', 'max:255'],
            'service_offered' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2048'],
            'year_of_completion' => ['required', 'numeric', 'min:1', 'max:' . now()->year],
        ];
    }
}
