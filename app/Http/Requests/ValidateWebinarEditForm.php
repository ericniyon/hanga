<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateWebinarEditForm extends FormRequest
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
    public function rules()
    {
        return [
            // 'photo' =>'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' =>'required',
            'type' =>'required',
            'company' =>'required',
            'long_description' =>'required',
            'short_description' =>'required',
            'location' =>'required',
            'is_free' =>'required',
            'price' =>'required_with:is_free,0',
            'start_date' =>'required',
            'end_date' =>'required|after:start_date',
            "start_time"    => [
                'nullable',
                'array' // input must be an array
            ],
            "end_time"    => [
                'nullable',
                'array' // input must be an array
            ],
            "start_time.*"  => [
                    'nullable',
                    'date',
            ],
            "end_time.*"  => [
                    'nullable',
                    'date',
            ],
        ];
    }
    public function attributes()
    {
        return[
            'start_time' =>'Start Date',
            'start_time' =>'Start Date',
            'end_time.*' =>'End Date',
            'end_time.*' =>'End Date',
        ];
    }
    public function messages()
    {
        return [
            'price.required_with' =>'The price is a must when event is not Free.'
        ];
    }
}
