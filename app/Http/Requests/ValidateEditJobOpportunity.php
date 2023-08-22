<?php

namespace App\Http\Requests;

use App\Constants;
use App\FileManager;
use Illuminate\Foundation\Http\FormRequest;

class ValidateEditJobOpportunity extends FormRequest
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

 /*   public function all($keys = null): array
    {
        $attributes = parent::all();
        //you can modify your inputs here before it is validated
        return Constants::getModifiedUrlAttributes($attributes, ['link']);
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'logo' => ['nullable', 'mimes:' . FileManager::ALLOWED_IMAGE_TYPES, 'max:' . FileManager::DEFAULT_FILE_SIZE],
            'company_name' => 'required',
            'job_title' => 'required',
            'link' => ['nullable', 'active_url'],
//            'deadline'=>[ 'required|after_or_equal:today'],
            'grant' => ['required_if:has_grant,on', 'nullable', 'numeric', 'min:1'],
            'opportunity_type' => 'required',
            'required_experience' => ['numeric', 'min:1', 'digits_between:1,2'],
            'attachment' => 'mimes:jpg,jpeg,png,xls,xlsx,doc,docx,pdf',
            'job_details' => 'required',
        ];
    }
}
