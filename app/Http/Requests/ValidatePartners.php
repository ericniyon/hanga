<?php

namespace App\Http\Requests;

use App\FileManager;
use Illuminate\Foundation\Http\FormRequest;

class ValidatePartners extends FormRequest
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

    const MAX_LOGO_WIDTH = 512;
    const MAX_LOGO_HEIGHT = 512;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'logo' => [
                'required_if:PartnerId,0',
                'mimes:' . FileManager::ALLOWED_IMAGE_TYPES,
                'max:' . FileManager::DEFAULT_FILE_SIZE,
                /*  'dimensions:max_width=' . self::MAX_LOGO_WIDTH . ',max_height=' . self::MAX_LOGO_HEIGHT*/
            ],
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required_if' => "The logo field is required",
            'logo.dimensions' => "The logo has invalid image dimensions. dimensions:max width=" . self::MAX_LOGO_WIDTH . ",max height=" . self::MAX_LOGO_HEIGHT,
        ];
    }
}
