<?php


namespace App\Http\Requests;


use App\Constants;
use App\Models\MSMERegistration;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateMsmeRegistration extends FormRequest
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

    public function all($keys = null): array
    {
        $attributes = parent::all();
        //you can modify your inputs here before it is validated
        return Constants::getModifiedUrlAttributes($attributes, ['website']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'current_step' => 'required',
            'platform_id' => ['nullable'],
            'payment_method_id' => 'required',
            'business_sector_id' => 'required',
            'support_service_id' => ['required_if:current_step,2'],
            'interests_id' => ['required_if:current_step,2'],
            'categories_id' => 'required',
            'application_id' => ['required_unless:id,0'],
            'company_name' => ['required'],
            'tin' => ['required_if:current_step,1', 'regex:/^[0-9]+$/', 'min:9', 'max:9'],
            'bio' => ['required', 'max:800'],
            'company_phone' => [
                'required', 'string',
                new ValidatePhoneNumber()
            ],
            'company_email' => [
                'required', 'string', 'email',
            ],
            'registration_date' => ['required', 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'rdb_certificate' => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'number_of_employees' => ['required', 'min:0', 'integer'],
//            'company_category_id' => ['required', 'min:1', 'integer'],
//            step 2
            'province_id' => ['required_if:current_step,3',],
            'district_id' => ['required_if:current_step,3'],
            'sector_id' => ['required_if:current_step,3'],
            'cell_id' => ['required_if:current_step,3'],
            'village_id' => ['required_if:current_step,3'],
            'website' => ['nullable', 'active_url', 'max:255'],
            'representative_name' => ['required_if:current_step,4', 'max:255'],
            'representative_email' => ['required_if:current_step,4', 'nullable', 'email', 'max:255'],
            'representative_phone' => ['required_if:current_step,4', 'nullable',
                new ValidatePhoneNumber(),
                'regex:/^[0-9 ]+$/'
            ],
            'representative_position' => ['required_if:current_step,4', 'nullable',],
            'representative_gender' => ['required_if:current_step,4', 'max:10', 'nullable',],
            'representative_physical_disability' => ['nullable', 'max:50'],

        ];
    }

    public function messages(): array
    {
        $errorMessage = 'This field is required.';
        return [
            'company_name.required_if' => $errorMessage,
            'tin.required_if' => $errorMessage,
            'company_phone.required_if' => $errorMessage,
            'company_email.required_if' => $errorMessage,
            'registration_date.required_if' => $errorMessage,
            'rdb_certificate.required_if' => $errorMessage,
            'number_of_employees.required_if' => $errorMessage,
            'company_category_id.required_if' => $errorMessage,

            'province_id.required_if' => $errorMessage,
            'district_id.required_if' => $errorMessage,
            'sector_id.required_if' => $errorMessage,
            'cell_id.required_if' => $errorMessage,
            'village_id.required_if' => $errorMessage,
            'logo.required_if' => $errorMessage,
            'support_service_id.required_if' => "Please choose at least one service",
            'support_service_id.required' => "Please choose at least one service",
            'company_description.required_if' => $errorMessage,
            'website.website' => 'The website format is invalid e.g http:abc.com',
            'representative_phone.regex' => 'The representative phone format is invalid. remove special characters like. +,($@..',
            'interests_id.required_if' => "Please choose at least one area of interest",
            'interests_id.required' => "Please choose at least one area of interest",
        ];

    }

}
