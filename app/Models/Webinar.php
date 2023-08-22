<?php

namespace App\Models;

use App\FileManager;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use function json_encode;

/**
 * App\Models\Webinar
 *
 * @property int $id
 * @property string|null $photo
 * @property string $title
 * @property string $type webinars, events, workshops...
 * @property string|null $company
 * @property string|null $short_description
 * @property string|null $long_description
 * @property string|null $location
 * @property bool|null $is_free
 * @property float|null $price
 * @property string|null $address
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string|null $other_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $attachment
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Collection|WebinarDate[] $otherDates
 * @property-read int|null $other_dates_count
 * @method static Builder|Webinar newModelQuery()
 * @method static Builder|Webinar newQuery()
 * @method static Builder|Webinar query()
 * @method static Builder|Webinar whereAddress($value)
 * @method static Builder|Webinar whereAttachment($value)
 * @method static Builder|Webinar whereCompany($value)
 * @method static Builder|Webinar whereCreatedAt($value)
 * @method static Builder|Webinar whereEndDate($value)
 * @method static Builder|Webinar whereId($value)
 * @method static Builder|Webinar whereIsActive($value)
 * @method static Builder|Webinar whereIsFree($value)
 * @method static Builder|Webinar whereLocation($value)
 * @method static Builder|Webinar whereLongDescription($value)
 * @method static Builder|Webinar whereOtherDate($value)
 * @method static Builder|Webinar wherePhoto($value)
 * @method static Builder|Webinar wherePrice($value)
 * @method static Builder|Webinar whereShortDescription($value)
 * @method static Builder|Webinar whereStartDate($value)
 * @method static Builder|Webinar whereTitle($value)
 * @method static Builder|Webinar whereType($value)
 * @method static Builder|Webinar whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Webinar extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'end_date'=>'datetime',
        'start_date'=>'datetime',
    ];
    protected $dates = [
        'end_date',
        'start_date',
    ];
    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Event not found");
    }
    public function setOtherDateAttribute($value)
    {
        $this->attributes['other_date'] = json_encode(array_filter($value, function ($var) {return !is_null($var);}));
    }
    public function otherDates(): HasMany
    {
        return $this->hasMany(WebinarDate::class, 'webinar_id');
    }
    public function getImage(): ?string
    {
        return $this->photo ? Storage::url(FileManager::WEBINAR_IMAGES_PATH.$this->photo) : null;
    }
    public function getAttachment(): ?string
    {
        return $this->attachment ? Storage::url(FileManager::WEBINAR_ATTACHMENT_PATH.$this->attachment) : null;
    }
}
