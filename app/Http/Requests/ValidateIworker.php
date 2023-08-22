<?php

namespace App\Http\Requests;

use App\Constants;
use App\FileManager;
use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Rules\ValidateIdNumber;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class ValidateIworker extends FormRequest
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

    public function all($keys = null): array
    {
        $attributes = parent::all();
        //you can modify your inputs here before it is validated
        return Constants::getModifiedUrlAttributes($attributes, ['website', 'portfolio_link']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'application_id' => ['required_if:current_step,1'],
            'iworker_type' => ['required_if:current_step,1'],
            'name' => ['required_if:current_step,1'],
            'id_type' => ['required_if:current_step,1'],
            'id_number' => ['required_if:current_step,1', new ValidateIdNumber()],
            'support_service_id' => ['required_if:current_step,2'],
            'interests_id' => ['required_if:current_step,2'],
            'categories_id' => ['required'],
            'bio' => ['required', 'max:800'],
            'phone' => ['required_if:current_step,1', new ValidatePhoneNumber()],
            'email' => ['required_if:current_step,1', 'email'],
            'gender' => ['required_if:iworker_type,' . Constants::Individual],
            'comp_date_of_registration' => ['required_if:iworker_type,' . Constants::Company, 'nullable', 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'dob' => ['required_if:iworker_type,' . Constants::Individual, 'nullable', 'date', 'before_or_equal:' . now()->addYears(-18)->format('Y-m-d')],
            'level_of_study_id' => ['required_if:iworker_type,' . Constants::Individual],
            'field_of_study_id' => ['required_if:iworker_type,' . Constants::Individual],
            'portfolio_link' => ['nullable', 'active_url'],
            'website' => ['nullable', 'active_url'],

            'supporting_document' => [$this->validateDocument(), FileManager::DEFAULT_ALLOWED_FILE_TYPES, 'max:' . FileManager::DEFAULT_FILE_SIZE],
//            'profile_picture' => [$this->validateProfile(), 'mimes:jpg,jpeg,png,pdf', 'max:' . FileManager::DEFAULT_FILE_SIZE],
//            'logo' => [$this->validateLogo(), 'mimes:jpg,jpeg,png,pdf', 'max:' . FileManager::DEFAULT_FILE_SIZE],
            'rdb_certificate' => [$this->validateRdb(), FileManager::DEFAULT_ALLOWED_FILE_TYPES, 'max:' . FileManager::DEFAULT_FILE_SIZE],
//            'cp_description' => ['required_if:iworker_type,' . Constants::Company],

            'physical_disability_id' => ['nullable'],
            'province_id' => ['required_if:current_step,3'],
            'district_id' => ['required_if:current_step,3'],
            'sector_id' => ['required_if:current_step,3'],
            'cell_id' => ['required_if:current_step,3'],
            'village_id' => ['required_if:current_step,3'],
            'digital_literacy' => [
                'nullable',
                /*  Rule::requiredIf(function () {
                      if (request('iworker_type') == Constants::Company)
                          return false;
                      if (request('current_step') == 2)
                          return true;
                      return false;
                  })*/
            ],
            'can_attend_online_class' => ['required_if:current_step,3'],
            'has_bank_account' => ['required_if:current_step,3'],
            'credit_access' => ['required_if:current_step,3'],
            'credit_sources' => ['nullable', 'array'],

            'platforms_links' => ['nullable', 'array'],
            'platforms_links.*' => ['nullable', 'active_url'],
            'digital_payments' => ['required_if:current_step,3'],

            'cp_representative_name' => [$this->getCompanyRequiredIf(), 'nullable'],
            'cp_representative_email' => [$this->getCompanyRequiredIf(), 'nullable', 'email'],
            'cp_representative_phone' => [$this->getCompanyRequiredIf(), 'nullable', new ValidatePhoneNumber()],
            'cp_representative_position' => [$this->getCompanyRequiredIf(), 'nullable', 'min:2', 'max:50'],
            'cp_representative_gender' => [$this->getCompanyRequiredIf(), 'nullable']
        ];
    }

    public function messages(): array
    {
        $errorMessage = 'This field is required.';
        return [
            'cp_representative_name.required' => "The company representative name field is required.",
            'cp_representative_email.required' => "The company representative name field is required.",
            'cp_representative_phone.required' => "The company representative name field is required.",
            'cp_representative_position.required' => "The company representative name field is required.",
            'cp_representative_gender.required' => "The company representative name field is required.",

            'categories_id.required' => $errorMessage,
            'digital_payments.required_if' => 'Choose at least one digital payment',
            'name.required_if' => $errorMessage,
            'iworker_type.required_if' => $errorMessage,
            'id_type.required_if' => $errorMessage,
            'id_number.required_if' => $errorMessage,
            'phone.required_if' => $errorMessage,
            'email.required_if' => $errorMessage,
            'comp_date_of_registration.required_if' => $errorMessage,
            'dob.required_if' => $errorMessage,
            'level_of_study_id.required_if' => $errorMessage,
            'field_of_study.required_if' => $errorMessage,
            'supporting_document.required_if' => $errorMessage,

            'province_id.required_if' => $errorMessage,
            'district_id.required_if' => $errorMessage,
            'sector_id.required_if' => $errorMessage,
            'cell_id.required_if' => $errorMessage,
            'village_id.required_if' => $errorMessage,
            'platforms_links.active_url' => "The platforms links must be valid URLs.",
            'platforms_links.*.active_url' => "The platforms links must be valid URLs.",
            'support_service_id.required_if' => "Please choose at least one service",
            'support_service_id.required' => "Please choose at least one service",
            'interests_id.required_if' => "Please choose at least one area of interest",
            'interests_id.required' => "Please choose at least one area of interest",
            'has_bank_account.required_if' => "Please choose if you have bank account.",
            'can_attend_online_class.required_if' => "Please choose if you can attend online class.",
            'credit_access.required_if' => "Please choose if you can attend online class.",
        ];
    }

    /**
     * @return RequiredIf
     */
    protected function validateLogo(): RequiredIf
    {
        return Rule::requiredIf(function () {
            if (request('iworker_type') == Constants::Individual)
                return false;
            if (request('id') == 0 && request('current_step') == 1)
                return true;
            return false;
        });
    }

    /**
     * @return RequiredIf
     */
    protected function validateRdb(): RequiredIf
    {
        return Rule::requiredIf(function () {
            /*if (request('iworker_type') == Constants::Individual)
                return false;

            if (request('id') == 0 && request('current_step') == 1)
                return true;*/
            return false;
        });
    }

    /**
     * @return RequiredIf
     */
    protected function validateProfile(): RequiredIf
    {
        return Rule::requiredIf(function () {
            if (request('iworker_type') == Constants::Company)
                return false;

            if (request('id') == 0 && request('current_step') == 1)
                return true;
            return false;
        });
    }

    /**
     * @return RequiredIf
     */
    protected function validateDocument(): RequiredIf
    {
        return Rule::requiredIf(function () {
            if (request('iworker_type') == Constants::Company)
                return false;
            if (request('id') == 0 && request('current_step') == 1)
                return true;
            return false;
        });
    }

    /**
     * @return RequiredIf
     */
    protected function getCompanyRequiredIf(): RequiredIf
    {
        return Rule::requiredIf(function () {
            return (request('iworker_type') == Constants::Company) && (request('current_step') == 4);
        });
    }

}
