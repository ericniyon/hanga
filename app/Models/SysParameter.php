<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\SysParameter
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter query()
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SysParameter whereValue($value)
 * @mixin \Eloquent
 */
class SysParameter extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $fillable=['name','value'];
}
