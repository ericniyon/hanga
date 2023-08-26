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
            'team_firstname'    => ['required_if:current_step,2'],
            'team_lastname'     => ['required_if:current_step,2'],
            'team_position'     => ['required_if:current_step,2'],
            'team_phone'        => ['required_if:current_step,2'],
            'team_email'        => ['required_if:current_step,2', 'unique:startup_company_teams,team_email'],
        ];
    }
}
