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
 * App\Models\ApplicationBranch
 *
 * @property int $id
 * @property string|null $name
 * @property int $province_id
 * @property int $district_id
 * @property int $sector_id
 * @property int $cell_id
 * @property int $village_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ApplicationBranch newModelQuery()
 * @method static Builder|ApplicationBranch newQuery()
 * @method static Builder|ApplicationBranch query()
 * @method static Builder|ApplicationBranch whereCellId($value)
 * @method static Builder|ApplicationBranch whereCreatedAt($value)
 * @method static Builder|ApplicationBranch whereDistrictId($value)
 * @method static Builder|ApplicationBranch whereId($value)
 * @method static Builder|ApplicationBranch whereName($value)
 * @method static Builder|ApplicationBranch whereProvinceId($value)
 * @method static Builder|ApplicationBranch whereSectorId($value)
 * @method static Builder|ApplicationBranch whereUpdatedAt($value)
 * @method static Builder|ApplicationBranch whereVillageId($value)
 * @mixin Eloquent
 * @property int|null $application_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell $cell
 * @property-read \App\Models\District $district
 * @property-read \App\Models\Province $province
 * @property-read \App\Models\Sector $sector
 * @property-read \App\Models\Village $village
 * @method static Builder|ApplicationBranch whereApplicationId($value)
 */
class ApplicationBranch extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Branch is not found");
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function cell(): BelongsTo
    {
        return $this->belongsTo(Cell::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
