<?php

namespace App\Http\Requests;

use App\FileManager;
use Illuminate\Foundation\Http\FormRequest;

class ValidateEmployee extends FormRequest
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
            'iworker_registration_id' => ['required'],
            'name' => ['required'],
            'position' => ['required'],
            'recruitment_date' => ['required','date', 'before_or_equal:' . today()->format('Y-m-d')],
            'level_of_study_id' => ['required'],
            'field_of_study' => ['required'],
            'supporting_document' => ['required_if:id,0', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:' . FileManager::DEFAULT_FILE_SIZE],
        ];
    }

    public function messages(): array
    {
        return [
            'supporting_document.required_if' => 'The supporting document field is required',
            'level_of_study_id.required' => 'The level of study field is required.',
        ];
    }
}
