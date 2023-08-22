<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFrontJobOpportunity extends FormRequest
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
            'job_title'=>'required',
//            'job_type'=>'required',

            'opportunity_type'=>'required',
            'deadline'=>'required|after_or_equal:today',
            'link'=>'nullable|url',
            'attachment'=>'mimes:jpg,jpeg,png,xls,xlsx,doc,docx,pdf',
            'job_details'=>'required',
            'grant'=>'required_if:has_grant,on',
        ];
    }
}
