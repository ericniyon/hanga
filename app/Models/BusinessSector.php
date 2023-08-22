<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\BusinessSector
 *
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|BusinessSector newModelQuery()
 * @method static Builder|BusinessSector newQuery()
 * @method static Builder|BusinessSector query()
 * @method static Builder|BusinessSector whereCreatedAt($value)
 * @method static Builder|BusinessSector whereId($value)
 * @method static Builder|BusinessSector whereName($value)
 * @method static Builder|BusinessSector whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $name_kn
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static Builder|BusinessSector whereNameKn($value)
 */
class BusinessSector extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    protected $guarded = [];

    public function getNameLocaleAttribute($value): ?string
    {
        return app()->getLocale() == 'rw' ? ($this->name_kn ?? $this->name) : $this->name;
    }
}
