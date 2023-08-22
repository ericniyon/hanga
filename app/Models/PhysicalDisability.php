<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\PhysicalDisability
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_kn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability whereNameKn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalDisability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhysicalDisability extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
