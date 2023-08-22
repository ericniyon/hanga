<?php


namespace App\Http\Requests;



use App\Models\DSPRegistration;
use App\Models\MSMERegistration;
use App\Rules\ValidatePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateDspIdentification extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'company_name' => ['required'],
            'tin' => ['required', 'regex:/^[0-9]+$/', 'min:9', 'max:9'],
            'bio' => ['required', 'max:200'],
            'business_sector_id' => 'required',
            'company_phone' => [
                'required',
                new ValidatePhoneNumber(),
                'regex:/^[0-9 ]+$/'
            ],
            'company_email' => [
                'required', 'string', 'email',
            ],
            'support_service_id' => 'required',
            'categories_id' => 'required',
            'registration_date' => ['required', 'date','before_or_equal:'.today()->format('Y-m-d')],
            'rdb_certificate' => [ 'mimes:jpg,jpeg,pdf', 'max:2000'],
            'number_of_employees' => ['required', 'min:0', 'integer'],
        ];
    }


}

