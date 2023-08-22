<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPackege extends Model
{
    use HasFactory;

    protected $fillable = [
        'packege_name', 'packege_description', 'organization_description', 'cover_picture'
    ];

    /**
     * Get all of the comments for the MembershipPackege
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clusts()
    {
        return $this->hasMany(ClusterAssociationCategory::class, 'membership_packeges_id', 'id');
    }

    /**
     * Get all of the comments for the MembershipPackege
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany(PackegePromotion::class, 'membership_packeges_id', 'id');
    }
}
