<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ClusterAssociationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'membership_packeges_id',
    ];

    /**
     * Get all of the comments for the ClusterAssociationCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(AssociationItem::class, 'cluster_association_categories_id', 'id');
    }
}
