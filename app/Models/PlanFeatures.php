<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlanFeatures extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'plan_id', 'membership_packeges_id'];

    protected $casts = [
        'plan_id' => 'array',
    ];

    /**
     * The plans that belong to the PlanFeatures
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class,'feature_plan','plan_feature_id','plan_id');
    }
}
