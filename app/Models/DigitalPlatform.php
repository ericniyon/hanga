<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\DigitalPlatform
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|DigitalPlatform whereNameKn($value)
 */
class DigitalPlatform extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded=[];
}
