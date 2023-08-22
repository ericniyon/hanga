<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\WebinarDate
 *
 * @property int $id
 * @property int $webinar_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Webinar $webinar
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebinarDate whereWebinarId($value)
 * @mixin \Eloquent
 */
class WebinarDate extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }
}
