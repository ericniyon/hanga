<?php

namespace App\Http\Requests;

use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateSolution extends FormRequest
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
            'description' => ['required', 'string', 'max:500'],
            'has_api' => ['required_if:solution_type,Product'],
            'logo' => ['mimes:jpeg,jpg,png', 'max:1024',
                Rule::requiredIf(function () {
                    if (request('id') == 0 && request('solution_type') == 'Product')
                        return true;
                    return false;
                }),
            ],
            'api_name' => ['required_if:has_api,1'],
            'api_description' => ['required_if:has_api,1'],
            'api_link' => ['required_if:has_api,1', 'nullable', 'active_url'],
            'platforms' => ['check_array:1'],
            'dsp_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', new ValidatePhoneNumber()]
        ];
    }

    public function messages(): array
    {
        return [
            'has_api.required_if' => "This field is required",
//            'logo.required_if' => "This field is required",
            'api_name.required_if' => "This field is required",
            'api_description.required_if' => "This field is required",
            'api_link.required_if' => "This field is required",
            'dsp_name.required' => "This field is required",
            'platforms.check_array' => "Please provide at least one Link (Type of platform) to your Solution"
        ];
    }
}
