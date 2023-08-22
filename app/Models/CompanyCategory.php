<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\CompanyCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RegistrationType[] $registrationTypes
 * @property-read int|null $registration_types_count
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyCategory whereNameKn($value)
 */
class CompanyCategory extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function registrationTypes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(RegistrationType::class, 'category_registration_type','category_id');
    }

    public function getNameLocaleAttribute($value): ?string
    {
        return app()->getLocale() == 'rw' ? ($this->name_kn ?? $this->name) : $this->name;
    }
}
