<?php

namespace App\Models;

use App\FileManager;
use App\Traits\HasRating;
use App\Traits\PhotoUrl;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ApplicationSolution
 *
 * @property int $id
 * @property int $application_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $type ex:service, product
 * @property string|null $platform_type
 * @property string|null $mobile_application_type
 * @property string|null $has_api
 * @property string|null $api_name
 * @property string|null $api_description
 * @property string|null $api_link
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ApplicationSolution newModelQuery()
 * @method static Builder|ApplicationSolution newQuery()
 * @method static Builder|ApplicationSolution query()
 * @method static Builder|ApplicationSolution whereApiDescription($value)
 * @method static Builder|ApplicationSolution whereApiLink($value)
 * @method static Builder|ApplicationSolution whereApiName($value)
 * @method static Builder|ApplicationSolution whereApplicationId($value)
 * @method static Builder|ApplicationSolution whereCreatedAt($value)
 * @method static Builder|ApplicationSolution whereDescription($value)
 * @method static Builder|ApplicationSolution whereHasApi($value)
 * @method static Builder|ApplicationSolution whereId($value)
 * @method static Builder|ApplicationSolution whereMobileApplicationType($value)
 * @method static Builder|ApplicationSolution whereName($value)
 * @method static Builder|ApplicationSolution wherePlatformType($value)
 * @method static Builder|ApplicationSolution whereType($value)
 * @method static Builder|ApplicationSolution whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $logo
 * @property string|null $website
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $dsp_name
 * @property bool $solution_enabled
 * @property bool $open_api_enabled
 * @property-read Application|null $application
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read string|null $logo_url
 * @property-read string $type_color
 * @property-read Collection|PlatformType[] $platformTypes
 * @property-read int|null $platform_types_count
 * @property-read Collection|SolutionPlatform[] $solutionPlatforms
 * @property-read int|null $solution_platforms_count
 * @property-read Collection|Specialty[] $specialties
 * @property-read int|null $specialties_count
 * @method static Builder|ApplicationSolution whereDspName($value)
 * @method static Builder|ApplicationSolution whereEmail($value)
 * @method static Builder|ApplicationSolution whereLogo($value)
 * @method static Builder|ApplicationSolution whereOpenApiEnabled($value)
 * @method static Builder|ApplicationSolution wherePhone($value)
 * @method static Builder|ApplicationSolution whereSolutionEnabled($value)
 * @method static Builder|ApplicationSolution whereWebsite($value)
 * @property-read Collection|\App\Models\BusinessSector[] $businessSectors
 * @property-read int|null $business_sectors_count
 * @property-read \App\Models\Rating|null $myRating
 * @property-read Collection|\App\Models\Rating[] $ratings
 * @property-read int|null $ratings_count
 * @method static Builder|ApplicationSolution orderRating($ratableId = 'clients.id')
 */
class ApplicationSolution extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory, PhotoUrl, HasRating;

    protected $appends = ['logo_url'];

    const Product = 'Product';
    const Service = 'Service';
    protected $guarded = [];

    public static function types(): array
    {
        return [self::Product, self::Service];
    }

    public function platformTypes(): BelongsToMany
    {
        return $this->belongsToMany(PlatformType::class, 'application_solution_platform_type')
            ->withPivot('link');
    }

    public function solutionPlatforms(): HasMany
    {
        return $this->hasMany(SolutionPlatform::class, 'application_solution_id');
    }

    public function getTypeColorAttribute(): string
    {
        $types = [
            self::Product => 'info',
            self::Service => 'primary'
        ];
        return $types[$this->type];
    }

    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'solution_specialities', 'solution_id', 'speciality_id');
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo
            ? Storage::disk()->url(FileManager::DSP_PRODUCT_LOGO_PATH . $this->logo)
            : $this->getPhotoUrl(is_null($this->application) ? $this->dsp_name : optional(optional($this->application)->client)->name);
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, "ratable");
    }

    public function myRating(): HasOne
    {
        return $this->hasOne(Rating::class, 'ratable_id')
            ->where('ratable_type', '=', get_class($this))
            ->where('done_by_id', '=', auth('client')->id());
    }

    public function relatedDigitalPlatforms()
    {
        return ApplicationSolution::with(['application', 'specialties'])
            ->whereHas('solutionPlatforms', function (Builder $builder) {
                $builder->whereIn('platform_type_id', $this->solutionPlatforms()->pluck('platform_type_id'));
            })
            ->orWhereHas('businessSectors', function (Builder $builder) {
                $builder->whereIn('business_sector_id', $this->businessSectors()->pluck('business_sector_id'));
            })
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->with(['platformTypes', 'application.client' => function ($query) {
                $query->active();
            }])
            ->where(function (Builder $builder) {
                $builder->whereNull('has_api')
                    ->orWhere('has_api', '=', false);
            })
            ->where([
                ['solution_enabled', '=', true],
                ['id', '<>', $this->id]
            ])
            ->orderRating("application_solutions.id")
            ->limit(10)
            ->get();
    }

    public function relatedApis()
    {
        return ApplicationSolution::where('has_api', true)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->where([
                ['open_api_enabled', '=', true],
                ['id', '<>', $this->id]
            ])
            ->orderRating("application_solutions.id")
            ->limit(10)
            ->get();
    }

    public function businessSectors(): BelongsToMany
    {
        return $this->belongsToMany(BusinessSector::class, 'solution_business_sectors', 'solution_id', 'business_sector_id');
    }

}
