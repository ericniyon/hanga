<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = ['title','message','affiliate_cohort_id'];

    /**
     * Get the cohort that owns the Broadcast
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cohort()
    {
        return $this->belongsTo(AffiliateCohort::class, 'affiliate_cohort_id', 'id');
    }
}
