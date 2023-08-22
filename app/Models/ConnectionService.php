<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ConnectionService
 *
 * @property int $id
 * @property int $service_id
 * @property int $connection_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService whereConnectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectionService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ConnectionService extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded=[];
    protected $table='connection_service';
}
