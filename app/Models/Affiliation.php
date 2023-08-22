<?php

namespace App\Models;

use App\Client;
use App\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Affiliation
 *
 * @property int $id
 * @property int $client_id
 * @property int $employer_id
 * @property string $position
 * @property string|null $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Client $client
 * @property-read Client $employer
 * @property-read string $status_color
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereEmployerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Affiliation extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class, 'employer_id');
    }

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getStatusColorAttribute(): string
    {
        $status = [
            Constants::Pending => 'info',
            Constants::Rejected => 'danger',
            Constants::Approved => 'success',
        ];

        return $status[$this->status];
    }
}
