<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerCategory whereNameKn($value)
 */
class IworkerCategory extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
