<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackegePromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion',
        'total_free',
        'time_to_date',
        'time_from_date',
        'membership_packeges_id',
    ];

    /**
     * Get the user that owns the PackegePromotion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promotion()
    {
        return $this->belongsTo(MembershipPackege::class, 'membership_packeges_id', 'id');
    }
}
