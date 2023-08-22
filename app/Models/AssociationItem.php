<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationItem extends Model
{
    use HasFactory;

    protected $fillable = [
            'name', 'cluster_association_categories_id'
    ];



    /**
     * Get all of the comments for the AssociationItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function association()
    {
        return $this->hasMany(ClusterAssociationCategory::class, 'id', 'cluster_association_categories_id');
    }

    /**
     * Get the cluster that owns the AssociationItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cluster()
    {
        return $this->belongsTo(ClusterAssociationCategory::class,'id', 'cluster_association_categories_id');
    }
}
