<?php

namespace App\Http\Requests;

use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateCompanyRepresentative extends FormRequest
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
            'cp_representative_name' => ['required', 'max:50'],
            'cp_representative_email' => ['required', 'email'],
            'cp_representative_phone' => ['required', new ValidatePhoneNumber()],
            'cp_representative_position' => ['required', 'min:2', 'max:50'],
            'cp_representative_gender' => ['required'],
            'rep_physical_disability_id' => ['nullable', 'max:100']
        ];
    }
}
