<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerMembership
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerMembership whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class IworkerMembership extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
