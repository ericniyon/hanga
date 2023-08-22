<?php

namespace App\Models;

use App\Client;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Connection
 *
 * @property int $id
 * @property int $requester_id
 * @property int $friend_id
 * @property string $request_comment
 * @property bool $is_default check if requester has written any message
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Client $friend
 * @property-read Client $requester
 * @property-read Collection|Service[] $services
 * @property-read int|null $services_count
 * @method static Builder|Connection newModelQuery()
 * @method static Builder|Connection newQuery()
 * @method static Builder|Connection query()
 * @method static Builder|Connection whereCreatedAt($value)
 * @method static Builder|Connection whereFriendId($value)
 * @method static Builder|Connection whereId($value)
 * @method static Builder|Connection whereIsDefault($value)
 * @method static Builder|Connection whereRequestComment($value)
 * @method static Builder|Connection whereRequesterId($value)
 * @method static Builder|Connection whereStatus($value)
 * @method static Builder|Connection whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Connection extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    protected $guarded = [];

    const PENDING = "Pending";
    const ACCEPTED = "Accepted";
    const REJECTED = "Rejected";

    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Client not found");
    }

    public function requester(): BelongsTo
    {
        return $this->belongsTo(Client::class, "requester_id");
    }

    public function friend(): BelongsTo
    {
        return $this->belongsTo(Client::class, "friend_id");
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, "connection_service", "connection_id", "service_id");
    }


}
