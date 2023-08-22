<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApplicantInfo;

class TranningApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'requirements'
    ];

    /**
     * Get all of the infos for the TranningApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function infos()
    {
        return $this->hasMany(ApplicantInfo::class);
    }
}
