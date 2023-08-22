<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\BusinessSectorRegistrationType
 *
 * @property int $id
 * @property int $business_sector_id
 * @property int $registration_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType whereBusinessSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType whereRegistrationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusinessSectorRegistrationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusinessSectorRegistrationType extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $table="business_sector_registration_type";
}
