<?php

namespace App\Http\Requests;

use App\Constants;
use Illuminate\Foundation\Http\FormRequest;

class ValidateMsmesCompanyAddress extends FormRequest
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

    public function all($keys = null): array
    {
        $attributes = parent::all();
        //you can modify your inputs here before it is validated
        return Constants::getModifiedUrlAttributes($attributes,['website']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "province_id" => "required",
            "district_id" => "required",
            "sector_id" => "required",
            "cell_id" => "required",
            "village_id" => "required",
            "website" =>["nullable",'active_url'],
        ];
    }
}
