<?php

namespace App\Rules;

use App\Constants;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ValidateIdNumber implements Rule
{
    private string $idType;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->idType = '';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->idType = request('id_type');
        $value = str_replace(' ', '', trim($value));

        if ($this->idType == Constants::IdNumber && Str::of($value)->length() == 16 && is_numeric($value)) {
            return true;
        } elseif ($this->idType == Constants::Tin && Str::of($value)->length() == 9 && is_numeric($value)) {
            return true;
        } elseif ($this->idType == Constants::Passport) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        if ($this->idType == Constants::IdNumber)
            return "ID number must be 16 characters in length";
        elseif ($this->idType == Constants::Tin)
            return "TIN number must be 9 characters in length";
        return 'The invalid ID number provided.';
    }
}
