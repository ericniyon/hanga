<?php


namespace App\Http\Requests;


use App\Constants;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidateDspAddress extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard('client')->check();
    }


    public function all($keys = null): array
    {
        $attributes = parent::all();
        return Constants::getModifiedUrlAttributes($attributes, ['website']);
    }




    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'province_id' => ['required',],
            'website' => ['required','active_url'],
            'district_id' => ['required'],
            'sector_id' => ['required'],
            'cell_id' => ['required'],
            'village_id' => ['required'],
        ];
    }
}
