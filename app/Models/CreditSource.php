<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\CreditSource
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|CreditSource whereNameKn($value)
 */
class CreditSource extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
