<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IndividualIworkerRegistration
 *
 * @method static \Illuminate\Database\Eloquent\Builder|IndividualIworkerRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndividualIworkerRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndividualIworkerRegistration query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class IndividualIworkerRegistration extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
