<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\RegistrationType
 *
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|RegistrationType newModelQuery()
 * @method static Builder|RegistrationType newQuery()
 * @method static Builder|RegistrationType query()
 * @method static Builder|RegistrationType whereCreatedAt($value)
 * @method static Builder|RegistrationType whereId($value)
 * @method static Builder|RegistrationType whereName($value)
 * @method static Builder|RegistrationType whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $description
 * @property string|null $name_kn
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Collection|BusinessSector[] $businessSectors
 * @property-read int|null $business_sectors_count
 * @property-read Collection|CompanyCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read string $type_color
 * @property-read Collection|Service[] $services
 * @property-read int|null $services_count
 * @method static Builder|RegistrationType whereDescription($value)
 * @method static Builder|RegistrationType whereNameKn($value)
 */
class RegistrationType extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    const iWorker = 'iWorker';
    const DSP = 'DSP';
    const MSME = 'MSME';
    const STARTUP = 'STARTUP';

    const iWorkerId = 2;
    const DSP_ID = 1;
    const MSME_ID = 3;
    const STARTUP_ID = 4;

    public static function findByName($name)
    {
        return RegistrationType::where('name', '=', $name)->first();
    }

    public function businessSectors()
    {
        return $this->belongsToMany(BusinessSector::class, 'business_sector_registration_type', 'registration_type_id', 'business_sector_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_registration_type', 'registration_type_id', 'service_id');
    }

    public function getTypeColorAttribute(): string
    {
        $types = [
            self::iWorker => 'secondary',
            self::DSP => 'success',
            self::MSME => 'info',
            self::STARTUP => 'info'
        ];
        return $types[$this->name];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CompanyCategory::class, 'category_registration_type', 'registration_type_id', 'category_id');
    }

    /*  public function interests(): BelongsToMany
      {
          return $this->belongsToMany(CompanyCategory::class, 'category_registration_type','registration_type_id','category_id');
      }*/
}
