<?php

namespace App\Models;

use App\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ProfileViews
 *
 * @property int $id
 * @property int $profile_id
 * @property int $visitor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Client $visitor
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfileViews whereVisitorId($value)
 * @mixin \Eloquent
 */
class ProfileViews extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded=[];

    public function visitor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class,"visitor_id");
    }

}
