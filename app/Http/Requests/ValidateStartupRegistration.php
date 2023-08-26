<?php


namespace App\Http\Requests;


use App\Constants;
use App\Models\MSMERegistration;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateStartupRegistration extends FormRequest
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
            'current_step'          => 'required',
            'business_sector_id'    => 'required',
            'company_name'          => ['required'],
            'tin'                   => ['required_if:current_step,1', 'regex:/^[0-9]+$/', 'min:2', 'max:9'],
            'mission'               => ['required', 'max:800'],
            'bio'                   => ['required', 'max:800'],
            'company_phone'         => ['required', 'string'],
            'company_email'         => ['required', 'string', 'email',],
            'registration_date'     => ['required', 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'rdb_certificate'       => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'logo'                  => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'company_category'      => ['required', 'min:1'],

            // step 4
            'revenue_stream' => ['required_if:current_step,4'],
            'market_size' => ['required_if:current_step,4'],
            'fund_raising' => ['required_if:current_step,4'],
            'fund_raising_reason' => ['required_if:current_step,4'],
            'acheivement' => ['required_if:current_step,4'],
            'acheivement_date' => ['required_if:current_step,4'],

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
            'company_category.required_if' => $errorMessage,


            'team_firstname.required_if' => $errorMessage,
            'team_lastname.required_if' => $errorMessage,
            'team_position.required_if' => $errorMessage,
            'team_phone.required_if' => $errorMessage,
            'team_email.required_if' => $errorMessage,

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
