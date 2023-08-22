<?php

namespace App\Http\Requests;

use App\Constants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateIworkerMoreDetails extends FormRequest
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
            'province_id' => ['required'],
            'district_id' => ['required'],
            'sector_id' => ['required'],
            'cell_id' => ['required'],
            'village_id' => ['required'],
            'digital_literacy' => ['required_if:iworker_type,Individual'],
            'can_attend_online_class' => ['required'],
            'has_bank_account' => ['required'],
            'credit_access' => ['required'],
            'credit_sources' => ['required'],
            'digital_payments' => ['required'],
        ];
    }
}
