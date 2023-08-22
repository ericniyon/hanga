<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\RegistrationCategory
 *
 * @property int $id
 * @property int $application_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RegistrationCategory extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
