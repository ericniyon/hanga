<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerExperience
 *
 * @property int $id
 * @property string $service_offered
 * @property string|null $description
 * @property string $year_of_completion
 * @property string|null $client
 * @property int $iworker_registration_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereIworkerRegistrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereServiceOffered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerExperience whereYearOfCompletion($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\IworkerRegistration $registration
 */
class IworkerExperience extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function registration(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IworkerRegistration::class,'iworker_registration_id');
    }
}
