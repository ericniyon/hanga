<?php

namespace App\Models;

use Composer\Util\Platform;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\SolutionPlatform
 *
 * @property int $id
 * @property int $platform_type_id
 * @property int $application_solution_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $link
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\PlatformType $platformType
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform whereApplicationSolutionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform wherePlatformTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SolutionPlatform whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SolutionPlatform extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];
    protected $table = 'application_solution_platform_type';

    public function platformType()
    {
        return $this->belongsTo(PlatformType::class,'platform_type_id');
    }


}
