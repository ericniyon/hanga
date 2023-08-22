<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\OpportunityStudyLevel
 *
 * @property int $id
 * @property int|null $study_level_id
 * @property int|null $opportunity_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel whereOpportunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel whereStudyLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityStudyLevel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityStudyLevel extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
