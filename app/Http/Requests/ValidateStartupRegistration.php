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
            'tin'                   => ['required_if:current_step,1', 'regex:/^[0-9]+$/', 'min:9', 'max:9'],
            'mission'               => ['required', 'max:800'],
            'business_description'  => ['required', 'max:800'],
            'problem'               => ['required', 'max:800'],
            'company_phone'         => ['required', 'string'],
            'company_email'         => ['required', 'string', 'email',],
            'registration_date'     => ['required', 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'rdb_certificate'       => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'logo'                  => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'pitch_deck'            => ['nullable', 'mimes:ppt,pptx', 'max:2048'],
            'company_category'      => ['required', 'min:1'],

            // step 4
            'target_customers'  => ['required_if:current_step,4'],
            'business_model'    => ['required_if:current_step,4'],
            'revenue_stream'    => ['required_if:current_step,4'],
            'customer_value'    => ['required_if:current_step,4'],
            'gmt_channel'       => ['required_if:current_step,4'],

            // step 5 traction
            'market_size_tam'   => ['required_if:current_step,5'],
            'market_size_sam'   => ['required_if:current_step,5'],
            'market_size_som'   => ['required_if:current_step,5'],
            'active_users'      => ['required_if:current_step,5'],
            'paying_customers'  => ['required_if:current_step,5'],
            'anual_recuring_revenue' => ['required_if:current_step,5'],
            'customer_growth_rate' => ['required_if:current_step,5'],

            // fundraising step 6
            'current_startup_stage' => ['required_if:current_step,6'],
            'previous_investment_size' => ['required_if:current_step,6'],
            'previous_investment_type' => ['required_if:current_step,6'],
            'target_investors' => ['required_if:current_step,6'],
            'target_investment_size' => ['required_if:current_step,6'],
            'fundraising_breakdown' => ['required_if:current_step,6'],
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
            'pitch_deck.required_if' => $errorMessage,
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

            // business model
            'target_customers.required_if'  => $errorMessage,
            'business_model.required_if'    => $errorMessage,
            'revenue_stream.required_if'    => $errorMessage,
            'customer_value.required_if'    => $errorMessage,
            'gmt_channel.required_if'       => $errorMessage,

            // traction

            'market_size_tam.required_if'  => $errorMessage,
            'market_size_sam.required_if'  => $errorMessage,
            'market_size_som.required_if'  => $errorMessage,
            'active_users.required_if'     => $errorMessage,
            'paying_customers.required_if' => $errorMessage,
            'anual_recuring_revenue.required_if' => $errorMessage,
            // 'revenue_frequency.required_if' => $errorMessage,
            'customer_growth_rate.required_if' => $errorMessage,
            'gross_transaction_value.required_if' => $errorMessage,
        ];
    }
}
