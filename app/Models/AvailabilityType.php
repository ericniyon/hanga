<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AvailabilityType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name_kn
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereNameKn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AvailabilityType extends Model
{
    use HasFactory;
}
