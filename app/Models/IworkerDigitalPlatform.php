<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerDigitalPlatform
 *
 * @property int $id
 * @property int $digital_platform_id
 * @property int $iworker_registration_id
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\DigitalPlatform $platform
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereDigitalPlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereIworkerRegistrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerDigitalPlatform whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IworkerDigitalPlatform extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table = 'iworker_registration_digital_platform';
    protected $guarded = [];

    public function platform(): BelongsTo
    {
        return $this->belongsTo(DigitalPlatform::class,'digital_platform_id');
    }
}
