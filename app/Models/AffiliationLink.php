<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliationLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['link','expiry_date','max_joins','affiliate_cohort_id','active','client_id'];

    /**
     * Get the client that owns the AffiliationLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }

    /**
     * Get the cohort that owns the AffiliationLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cohort()
    {
        return $this->belongsTo(AffiliateCohort::class, 'affiliate_cohort_id', 'id');
    }
}
