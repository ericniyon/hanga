<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Specialty
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Collection|ApplicationSolution[] $solutions
 * @property-read int|null $solutions_count
 * @method static Builder|Specialty newModelQuery()
 * @method static Builder|Specialty newQuery()
 * @method static Builder|Specialty query()
 * @method static Builder|Specialty whereCreatedAt($value)
 * @method static Builder|Specialty whereId($value)
 * @method static Builder|Specialty whereName($value)
 * @method static Builder|Specialty whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $name_kn
 * @method static Builder|Specialty whereNameKn($value)
 */
class Specialty extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    protected $guarded = [];

    public function solutions(): BelongsToMany
    {
        return $this->belongsToMany(ApplicationSolution::class, 'solution_specialties', 'specialty_id', 'solution_id');
    }
}
