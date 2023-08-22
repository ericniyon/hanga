<?php

namespace App\Models;

use App\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliateCohort extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['parent_id','group_name','description','client_id'];

    /**
     * Get the user that owns the AffiliateCohort
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    /**
     * Get the user that owns the AffiliateCohort
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(AffiliateCohort::class, 'parent_id', 'id');
    }

    /**
     * Get all of the children for the AffiliateCohort
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(AffiliateCohort::class, 'parent_id', 'id');
    }

    /**
     * Get the link associated with the AffiliateCohort
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function link()
    {
        return $this->hasOne(AffiliationLink::class, 'affiliate_cohort_id', 'id');
    }
    /**
     * Get the clienst that belongs to this the AffiliateCohort
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function joins()
    {
        return $this->hasMany(ClientAffiliate::class, 'affiliate_cohort_id', 'id');
    }
}
