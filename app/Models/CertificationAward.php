<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\CertificationAward
 *
 * @property int $id
 * @property int $application_id
 * @property string $name
 * @property string $category
 * @property string|null $issue_date
 * @property string|null $expiry_date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward query()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificationAward whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class CertificationAward extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $dates = ['issue_date', 'expiry_date'];

    protected $guarded = [];

    public static function categories(): array
    {
        return ['Certificate', 'Award', 'Standard'];
    }
}
