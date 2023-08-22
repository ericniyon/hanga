<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\FieldOfStudy
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_kn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $level_of_study_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereLevelOfStudyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereNameKn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOfStudy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FieldOfStudy extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
