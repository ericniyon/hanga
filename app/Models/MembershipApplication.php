<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'packege_id',
        'clustre_items',
        'Strategic_oriantation',

        'student_benefit_sub_category',
        'student_benefitUniversity',
        'student_service_benefits',

        'innovator_invester_sub_category',
        'investor_service_benefits',

        'startups_benefit_sub_category',
        'startups_service_benefits',

        'ict_msm_service_benefits',

        'ict_consoltant_sub_category',
        'ict_consultant_item_service',

        'iWorker_sub_category',
        'iworkers_benefitsServices',

        'ict_ommunity_sub_category',
        'community_partner_benefits_services',

        'membership_levels',
        'applicant_id'
    ];

    protected $casts = [
        'clustre_items' => 'array',
        'strategic_oriantation' => 'array',
        'student_benefit_sub_category' => 'array',
        'student_service_benefits' => 'array',
        'ict_msm_service_benefits' => 'array',
    ];

    /**
     * Get the user that owns the MembershipApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Client::class, 'applicant_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(MembershipPackege::class, 'packege_id', 'id');
    }
}
