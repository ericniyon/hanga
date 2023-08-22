<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IncomeRange
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeRange whereNameKn($value)
 */
class IncomeRange extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
