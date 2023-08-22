<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'gender',
        'age',
        'education_level',
        'university',
        'devices_owned',
        'internet_access',
        'physical_tranning_attendence',
        'physical_attendence_district',
        'skills',
        'attend_digtal_tranning',
        'comment','application_id'
    ];
    /**
     * Get the applications that owns the ApplicantInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applications()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}
