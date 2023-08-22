<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMsmesBizIdentification extends FormRequest
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
            'company_name' => 'required',
            'tin' => 'required',
            'company_phone' => 'required',
            'company_email' => 'required',
            'registration_date' => ['required','date','before_or_equal:'.today()->format('Y-m-d')],
            'number_of_employees' => 'required',
            'categories_id' => 'required',
            'business_sector_id' => 'required',
            'payment_method_id' => 'required',
            'platform_id' => 'required',
            'support_service_id' => 'required',
            'bio' => 'required',
        ];
    }
}
