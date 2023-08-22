<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\MSMERegistration
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MSMERegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MSMERegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MSMERegistration query()
 * @mixin \Eloquent
 * @property mixed representative_name
 * @property mixed application
 * @property array|mixed|string|string[] logo
 * @property array|mixed|string|string[] rdb_certificate
 * @property mixed representative_physical_disability
 * @property mixed representative_gender
 * @property mixed representative_position
 * @property mixed representative_phone
 * @property mixed representative_email
 * @property mixed has_digital_platform
 * @property mixed company_description
 * @property mixed website
 * @property mixed village_id
 * @property mixed cell_id
 * @property mixed sector_id
 * @property mixed district_id
 * @property mixed province_id
 * @property mixed number_of_employees
 * @property mixed registration_date
 * @property mixed company_email
 * @property mixed company_phone
 * @property mixed tin
 * @property mixed company_name
 * @property mixed application_id
 * @property int $id
 * @property int $application_id
 * @property string|null $company_name
 * @property string|null $tin
 * @property \Illuminate\Support\Carbon|null $registration_date
 * @property string|null $rdb_certificate
 * @property int|null $province_id
 * @property int|null $district_id
 * @property int|null $sector_id
 * @property int|null $cell_id
 * @property int|null $village_id
 * @property string|null $company_phone
 * @property string|null $company_email
 * @property string|null $number_of_employees
 * @property string|null $website
 * @property int|null $company_category_id
 * @property string|null $company_description
 * @property string|null $logo
 * @property string|null $representative_name
 * @property string|null $representative_email
 * @property string|null $representative_phone
 * @property string|null $representative_position
 * @property string|null $representative_gender
 * @property string|null $representative_physical_disability
 * @property bool|null $has_digital_platform
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Application $application
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell|null $cell
 * @property-read \App\Models\CompanyCategory|null $companyCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DigitalPlatform[] $digitalPlatforms
 * @property-read int|null $digital_platforms_count
 * @property-read \App\Models\District|null $district
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentMethod[] $paymentMethods
 * @property-read int|null $payment_methods_count
 * @property-read \App\Models\Province|null $province
 * @property-read \App\Models\Sector|null $sector
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $supportServices
 * @property-read int|null $support_services_count
 * @property-read \App\Models\Village|null $village
 * @method static Builder|MSMERegistration whereApplicationId($value)
 * @method static Builder|MSMERegistration whereCellId($value)
 * @method static Builder|MSMERegistration whereCompanyCategoryId($value)
 * @method static Builder|MSMERegistration whereCompanyDescription($value)
 * @method static Builder|MSMERegistration whereCompanyEmail($value)
 * @method static Builder|MSMERegistration whereCompanyName($value)
 * @method static Builder|MSMERegistration whereCompanyPhone($value)
 * @method static Builder|MSMERegistration whereCreatedAt($value)
 * @method static Builder|MSMERegistration whereDistrictId($value)
 * @method static Builder|MSMERegistration whereHasDigitalPlatform($value)
 * @method static Builder|MSMERegistration whereId($value)
 * @method static Builder|MSMERegistration whereLogo($value)
 * @method static Builder|MSMERegistration whereNumberOfEmployees($value)
 * @method static Builder|MSMERegistration whereProvinceId($value)
 * @method static Builder|MSMERegistration whereRdbCertificate($value)
 * @method static Builder|MSMERegistration whereRegistrationDate($value)
 * @method static Builder|MSMERegistration whereRepresentativeEmail($value)
 * @method static Builder|MSMERegistration whereRepresentativeGender($value)
 * @method static Builder|MSMERegistration whereRepresentativeName($value)
 * @method static Builder|MSMERegistration whereRepresentativePhone($value)
 * @method static Builder|MSMERegistration whereRepresentativePhysicalDisability($value)
 * @method static Builder|MSMERegistration whereRepresentativePosition($value)
 * @method static Builder|MSMERegistration whereSectorId($value)
 * @method static Builder|MSMERegistration whereTin($value)
 * @method static Builder|MSMERegistration whereUpdatedAt($value)
 * @method static Builder|MSMERegistration whereVillageId($value)
 * @method static Builder|MSMERegistration whereWebsite($value)
 */
class MSMERegistration extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;


    protected $table = 'msme_registrations';
    protected $dates = ['registration_date'];
    protected $guarded = [];

    public static function reset($clientId=null)
    {
        $clientId=$clientId??auth('client')->id();
        $model = MSMERegistration::whereHas('application', function (Builder $builder) use ($clientId) {
            $builder->where('client_id', '=', $clientId);
        })->first();

        $application = $model->application;

        $model->digitalPlatforms()->detach();
        $model->paymentMethods()->detach();
        $model->supportServices()->detach();
        $model->delete();

        ApplicationSolution::where('application_id', '=', $application->id)->delete();
        $application->businessSectors()->detach();
        $application->deleteRelated();
        $application->delete();

    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function companyCategory(): BelongsTo
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id');
    }

    public function digitalPlatforms(): BelongsToMany
    {
        return $this->belongsToMany(DigitalPlatform::class, 'msme_registration_digital_platform', 'msme_registration_id', 'digital_platform_id');
    }

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'msme_registration_payment_method', 'msme_registration_id', 'msme_payment_id');
    }

    public function supportServices(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'msme_registration_support_service', 'msme_registration_id', 'service_id');
    }


    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function cell(): BelongsTo
    {
        return $this->belongsTo(Cell::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
