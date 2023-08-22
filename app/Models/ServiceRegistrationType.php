<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ServiceRegistrationType
 *
 * @property int $id
 * @property int $service_id
 * @property int $registration_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType whereRegistrationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceRegistrationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceRegistrationType extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table="service_registration_type";
}
