<?php

namespace App\Http\Requests;

use App\Constants;
use App\Models\DSPRegistration;
use App\Models\MSMERegistration;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateDspRegistration extends FormRequest
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
// ======================================

            // 'current_step' => 'required',
            // 'application_id' => ['required_unless:id,0'],
            // 'company_name' => ['required_if:current_step,1'],
            // 'tin' => ['required_if:current_step,1', 'digits:9'],
            // 'bio' => ['required', 'max:800'],

// ======================================
            // 'business_sector_id' => 'required',
            'company_phone' => [
                'required_if:current_step,1',
                new ValidatePhoneNumber(),
                'regex:/^[0-9 ]+$/'
            ],
            'company_email' => [
                'required_if:current_step,1', 'string', 'email',
            ],
            'support_service_id' => ['required_if:current_step,2'],
            'interests_id' => ['required_if:current_step,2'],
            'categories_id' => 'required',
            'registration_date' => ['required_if:current_step,1', 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'rdb_certificate' => ['nullable', 'mimes:jpg,jpeg,pdf,png', 'max:2000'],
            'number_of_employees' => ['required_if:current_step,1', 'min:0', 'integer'],
//            'company_category_id' => ['required_if:current_step,1', 'min:1', 'integer'],
//            step 2

// ======================================

            // 'province_id' => ['required_if:current_step,3',],
            // 'district_id' => ['required_if:current_step,3'],
            // 'sector_id' => ['required_if:current_step,3'],
            // 'cell_id' => ['required_if:current_step,3'],
            // 'village_id' => ['required_if:current_step,3'],

// ======================================


//            'logo' => [
//                Rule::requiredIf(function () {
//                    $model = DSPRegistration::find(request('id'));
//                    if (is_null($model))
//                        return false;
//                    if ($model->logo)
//                        return false;
//                    if (request('current_step') == 2)
//                        return true;
//                    return false;
//                }), 'mimes:jpg,jpeg,png', 'max:512'],





// ======================================

            // 'website' => ['nullable', 'max:50', 'active_url'],




// ======================================

//            'company_description' => ['nullable', 'required_if:current_step,2', 'string', 'max:2048'],
//            step 3



// ======================================

            // 'representative_name' => ['required_if:current_step,4',],
            // 'representative_email' => ['required_if:current_step,4', 'nullable', 'email'],
            // 'representative_phone' => ['required_if:current_step,4', 'nullable',
            //     new ValidatePhoneNumber(),
            //     'regex:/^[0-9 ]+$/'
            // ],
            // 'representative_position' => ['required_if:current_step,4', 'nullable',],
            // 'representative_gender' => ['required_if:current_step,4', 'max:10', 'nullable',],
            // 'representative_physical_disability' => ['nullable', 'max:50'],


// ======================================

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

            'company_description.required_if' => $errorMessage,
            'website.website' => 'The website format is invalid e.g http:abc.com',
            'representative_name.required_if' => $errorMessage,
            'representative_email.required_if' => $errorMessage,
            'representative_phone.required_if' => $errorMessage,
            'representative_position.required_if' => $errorMessage,
            'representative_gender.required_if' => $errorMessage,
            'representative_physical_disability.required_if' => $errorMessage,
            'support_service_id.required_if' => "Please choose at least one service",
            'interests_id.required_if' => "Please choose at least one area of interest",
            'interests_id.required' => "Please choose at least one area of interest",

        ];

    }
}
