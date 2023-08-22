<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOpenApiForm extends FormRequest
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
            'owner_logo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'api_owner' =>'required',
            'api_name' =>'required',
            // 'type' =>'required',
            'description' =>'required',
            'link' =>'required',
        ];
    }
}
