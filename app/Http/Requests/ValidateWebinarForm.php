<?php

namespace App\Http\Requests;

use App\FileManager;
use Illuminate\Foundation\Http\FormRequest;

class ValidateWebinarForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            // 'photo' =>'required',
            'photo' => ['required', 'mimes:' . FileManager::ALLOWED_IMAGE_TYPES, 'max:' . FileManager::DEFAULT_FILE_SIZE],
            'title' => 'required',
            'type' => 'required',
            'company' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'location' => 'required',
            'is_free' => 'required',
            // 'price' => ['required_with:is_free,1', 'numeric', 'min:0'],
            'start_date' => 'required|after_or_equal:today',
            'end_date' => 'required|after:start_date',
            "start_time" => [
                'nullable',
                'array' // input must be an array
            ],
            "end_time" => [
                'nullable',
                'array' // input must be an array
            ],
            "start_time.*" => [
                'nullable',
                'date',
                'after_or_equal:today'
            ],
            "end_time.*" => [
                'nullable',
                'date',
                'after_or_equal:today'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'start_time' => 'Start Date',
            'start_time' => 'Start Date',
            'end_time.*' => 'End Date',
            'end_time.*' => 'End Date',
        ];
    }

    public function messages()
    {
        return [
            'price.required_with' => 'The price is a must when event is not Free.'
        ];
    }
}
