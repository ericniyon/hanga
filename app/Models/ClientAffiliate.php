<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAffiliate extends Model
{
    use HasFactory;

    protected $table = 'client_affiliate';
    protected $fillable = ['affiliated_by','affiliates','affiliate_cohort_id','owner_status','affiliation_link_id','status'];

    /**
     * Get the group that owns the ClientAffiliate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cohort()
    {
        return $this->belongsTo(AffiliateCohort::class, 'affiliate_cohort_id', 'id');
    }

    /**
     * Get the link that owns the ClientAffiliate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function joiningLink()
    {
        return $this->belongsTo(AffiliationLink::class, 'affiliation_link_id', 'id');
    }
}
