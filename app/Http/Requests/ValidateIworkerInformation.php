<?php

namespace App\Http\Requests;

use App\Constants;
use App\FileManager;
use App\Rules\ValidateIdNumber;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class ValidateIworkerInformation extends FormRequest
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
//            'iworker_type' => ['required'],
            'name' => ['required'],
            'id_type' => ['required'],
            'id_number' => ['required', new ValidateIdNumber()],
//            'support_service_id' => ['required'],
//            'categories_id' => ['required'],
            'bio' => ['required', 'max:800'],
            'phone' => ['required', new ValidatePhoneNumber()],
            'email' => ['required', 'email'],
            'gender' => ['required_if:iworker_type,' . Constants::Individual],
            'comp_date_of_registration' => ['required_if:iworker_type,' . Constants::Company, 'date', 'before_or_equal:' . today()->format('Y-m-d')],
            'dob' => ['required_if:iworker_type,' . Constants::Individual, 'date', 'before_or_equal:' . today()->addYears(-18)->format('Y-m-d')],
            'level_of_study_id' => ['required_if:iworker_type,' . Constants::Individual],
            'field_of_study_id' => ['required_if:iworker_type,' . Constants::Individual],
            'website' => ['nullable', 'active_url'],
            'portfolio_link' => ['nullable', 'active_url'],
            'supporting_document' => ['nullable', 'mimes:doc,docx,jpg,jpeg,png,pdf', 'max:' . FileManager::DEFAULT_FILE_SIZE],
            'rdb_certificate' => ['nullable', 'mimes:doc,docx,jpg,jpeg,png,pdf', 'max:' . FileManager::DEFAULT_FILE_SIZE],
        ];
    }



}
