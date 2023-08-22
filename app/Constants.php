<?php


namespace App;


use Illuminate\Support\Str;

class Constants
{
    const Male = 'Male';
    const Female = 'Female';
    const Individual = 'Individual';
    const Company = 'Company';
    const Computer = 'Computer';
    const Smartphone = 'Smartphone';
    const Both = 'Computer and Smartphone';
    const Yes = 'Yes';
    const No = 'No';

    const Pending = 'Pending';
    const Approved = 'Approved';
    const Rejected = 'Rejected';

    const Tin = 'TIN';
    const IdNumber = 'ID Number';
    const Passport = 'Passport';

    const PARTNERS_PATH = 'partners/logo';

    public static function genders(): array
    {
        return [self::Male, self::Female];
    }

    public static function iWorkerTypes(): array
    {
        return [self::Individual, self::Company];
    }

    public static function literacy(): array
    {
        return [self::Computer, self::Smartphone];
    }

    public static function yesNos(): array
    {
        return [self::Yes, self::No];
    }

    public static function idTypes(): array
    {
        return [self::Tin, self::IdNumber, self::Passport];
    }

    /**
     * @param array $attributes
     * @param array $inputs
     * @return array
     */
    public static function getModifiedUrlAttributes(array $attributes, array $inputs): array
    {
        foreach ($inputs as $input) {
            if (empty($attributes["$input"]))
                continue;

            $attribute = $attributes[$input];
            if (Str::of($attribute)->startsWith('www.')) {
                $attributes[$input] = str_replace('www.', 'http://', $attribute);
            } elseif (!Str::of($attribute)->startsWith('http')) {
                $attributes[$input] = 'http://' . $attribute;
            }
        }
        return $attributes;
    }

}
