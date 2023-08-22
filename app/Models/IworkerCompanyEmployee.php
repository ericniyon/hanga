<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerCompanyEmployee
 *
 * @property int $id
 * @property string $name
 * @property string|null $position
 * @property string|null $recruitment_date
 * @property int|null $level_of_study_id
 * @property string|null $field_of_study
 * @property string|null $supporting_document
 * @property int $iworker_registration_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|IworkerCompanyEmployee newModelQuery()
 * @method static Builder|IworkerCompanyEmployee newQuery()
 * @method static Builder|IworkerCompanyEmployee query()
 * @method static Builder|IworkerCompanyEmployee whereCreatedAt($value)
 * @method static Builder|IworkerCompanyEmployee whereFieldOfStudy($value)
 * @method static Builder|IworkerCompanyEmployee whereId($value)
 * @method static Builder|IworkerCompanyEmployee whereIworkerRegistrationId($value)
 * @method static Builder|IworkerCompanyEmployee whereLevelOfStudyId($value)
 * @method static Builder|IworkerCompanyEmployee whereName($value)
 * @method static Builder|IworkerCompanyEmployee wherePosition($value)
 * @method static Builder|IworkerCompanyEmployee whereRecruitmentDate($value)
 * @method static Builder|IworkerCompanyEmployee whereSupportingDocument($value)
 * @method static Builder|IworkerCompanyEmployee whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\FieldOfStudy|null $fieldOfStudy
 * @property-read \App\Models\StudyLevel|null $studyLevel
 */
class IworkerCompanyEmployee extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['recruitment_date'];

    public function studyLevel(): BelongsTo
    {
        return $this->belongsTo(StudyLevel::class, 'level_of_study_id');
    }

    public function fieldOfStudy(): BelongsTo
    {
        return $this->belongsTo(FieldOfStudy::class,'field_of_study');
    }
}
