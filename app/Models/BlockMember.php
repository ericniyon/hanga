<?php

namespace App\Models;

use App\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\BlockMember
 *
 * @property int $id
 * @property int $blocker_id
 * @property int $blocked_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Client $blocked
 * @property-read Client $blocker
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember whereBlockedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember whereBlockerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockMember whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlockMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blocker(): BelongsTo
    {
        return $this->belongsTo(Client::class,"blocker_id");
    }

    public function blocked(): BelongsTo
    {
        return $this->belongsTo(Client::class,"blocked_id");
    }
}
