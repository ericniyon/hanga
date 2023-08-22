<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ReportSource
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReportSource extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
