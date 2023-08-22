<?php

namespace App\Models;

use App\Client;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Rating
 *
 * @property mixed comment
 * @property mixed rating
 * @property int|mixed|string|null done_by_id
 * @property int|mixed client_id
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Client $doneBy
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating whereClientId($value)
 * @method static Builder|Rating whereComment($value)
 * @method static Builder|Rating whereCreatedAt($value)
 * @method static Builder|Rating whereDoneById($value)
 * @method static Builder|Rating whereId($value)
 * @method static Builder|Rating whereRating($value)
 * @method static Builder|Rating whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int|null $client_id
 * @property int $done_by_id
 * @property int $rating
 * @property string|null $comment
 * @property int|null $ratable_id
 * @property string|null $ratable_type
 * @property-read Model|\Eloquent $ratable
 * @method static Builder|Rating whereRatableId($value)
 * @method static Builder|Rating whereRatableType($value)
 */
class Rating extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    protected $guarded = [];


    public function doneBy(): BelongsTo
    {
        return $this->belongsTo(Client::class, "done_by_id");
    }

    public function ratable(): MorphTo
    {
        return $this->morphTo();
    }
}
