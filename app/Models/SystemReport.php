<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\SystemReport
 *
 * @property int $id
 * @property string $report_name
 * @property string $data_source
 * @property string $column_list
 * @property bool $require_date_filter
 * @property string|null $date_filter
 * @property string|null $date_filter_description
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereColumnList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereDataSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereDateFilter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereDateFilterDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereReportName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereRequireDateFilter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemReport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SystemReport extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function resolveRouteBinding($value, $field = null)
    {
        $id=decryptId($value);
        return $this->find($id)??abort(404);
    }
}
