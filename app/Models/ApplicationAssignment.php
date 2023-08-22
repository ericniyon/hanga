<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ApplicationAssignment
 *
 * @property int $id
 * @property int $application_id
 * @property int|null $assigned_to
 * @property int|null $assigned_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereAssignedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationAssignment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User|null $assignedBy
 * @property-read \App\Models\User|null $assignedTo
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class ApplicationAssignment extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded=[];

    public function assignedTo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"assigned_to");
    }

    public function assignedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"assigned_by");
    }
}
