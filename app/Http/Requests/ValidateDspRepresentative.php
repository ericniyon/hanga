<?php


namespace App\Http\Requests;



use App\Models\DSPRegistration;
use App\Models\MSMERegistration;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateDspRepresentative extends FormRequest
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
            'representative_name' => ['required',],
            'representative_email' => ['required', 'nullable', 'email'],
            'representative_phone' => ['required', 'nullable',
                new ValidatePhoneNumber(),
                'regex:/^[0-9 ]+$/'
            ],
            'representative_position' => ['required', 'nullable',],
            'representative_gender' => ['required', 'max:10', 'nullable',],
            'representative_physical_disability' => ['nullable', 'max:50'],
        ];
    }


}

