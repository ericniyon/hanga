<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\StudyLevel
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|StudyLevel newModelQuery()
 * @method static Builder|StudyLevel newQuery()
 * @method static Builder|StudyLevel query()
 * @method static Builder|StudyLevel whereCreatedAt($value)
 * @method static Builder|StudyLevel whereId($value)
 * @method static Builder|StudyLevel whereName($value)
 * @method static Builder|StudyLevel whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FieldOfStudy[] $fieldOfStudy
 * @property-read int|null $field_of_study_count
 * @method static Builder|StudyLevel whereNameKn($value)
 */
class StudyLevel extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    public function fieldOfStudy(): HasMany
    {
        return $this->hasMany(FieldOfStudy::class,'level_of_study_id');
    }
}
