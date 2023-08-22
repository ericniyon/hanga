<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ApplicationCompletedProject
 *
 * @property int $id
 * @property int $application_id
 * @property string $name
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $description
 * @property string|null $client_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationCompletedProject whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class ApplicationCompletedProject extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $dates = ['start_date', 'end_date'];
}
