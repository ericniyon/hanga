<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupCompanyTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'team_firstname',
        'team_lastname',
        'team_phone',
        'team_email',
        'team_position',
        'team_linkedin',
        'team_description',
    ];
}
