<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStartupTeam extends FormRequest
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
            'team_firstname'    => ['required'],
            'team_lastname'     => ['required'],
            'team_position'     => ['required'],
            'team_phone'        => ['required'],
            'linkedin_profile'  => ['required'],
            'team_mate_description'  => ['required'],
            'team_email'        => ['required', 'email', 'unique:startup_company_teams,team_email'],
        ];
    }
}
