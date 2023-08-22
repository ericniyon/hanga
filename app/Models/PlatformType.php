<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\PlatformType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformType whereNameKn($value)
 */
class PlatformType extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    const Android = 'Android';
    const iOS = 'iOS';
    const Both = 'Both';

    public static function mobilePlatforms(): array
    {
        return [self::Android, self::iOS, self::Both];
    }
}
