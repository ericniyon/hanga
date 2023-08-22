<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\OpportunityType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereNameKn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpportunityType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpportunityType extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $fillable=['name,description'];
}
