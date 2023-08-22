<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerSoftSkill
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name_kn
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|IworkerSoftSkill whereNameKn($value)
 */
class IworkerSoftSkill extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
}
