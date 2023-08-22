<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\DSPRegistration
 *
 * @property-read Application $application
 * @property-read CompanyCategory $companyCategory
 * @method static Builder|DSPRegistration newModelQuery()
 * @method static Builder|DSPRegistration newQuery()
 * @method static Builder|DSPRegistration query()
 * @mixin Eloquent
 * @property int $id
 * @property int $application_id
 * @property string|null $company_name
 * @property string|null $TIN
 * @property string|null $registration_date
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|DSPRegistration whereApplicationId($value)
 * @method static Builder|DSPRegistration whereCellId($value)
 * @method static Builder|DSPRegistration whereCompanyCategoryId($value)
 * @method static Builder|DSPRegistration whereCompanyDescription($value)
 * @method static Builder|DSPRegistration whereCompanyEmail($value)
 * @method static Builder|DSPRegistration whereCompanyName($value)
 * @method static Builder|DSPRegistration whereCompanyPhone($value)
 * @method static Builder|DSPRegistration whereCreatedAt($value)
 * @method static Builder|DSPRegistration whereDistrictId($value)
 * @method static Builder|DSPRegistration whereId($value)
 * @method static Builder|DSPRegistration whereLogo($value)
 * @method static Builder|DSPRegistration whereNumberOfEmployees($value)
 * @method static Builder|DSPRegistration whereProvinceId($value)
 * @method static Builder|DSPRegistration whereRdbCertificate($value)
 * @method static Builder|DSPRegistration whereRegistrationDate($value)
 * @method static Builder|DSPRegistration whereRepresentativeEmail($value)
 * @method static Builder|DSPRegistration whereRepresentativeGender($value)
 * @method static Builder|DSPRegistration whereRepresentativeName($value)
 * @method static Builder|DSPRegistration whereRepresentativePhone($value)
 * @method static Builder|DSPRegistration whereRepresentativePhysicalDisability($value)
 * @method static Builder|DSPRegistration whereRepresentativePosition($value)
 * @method static Builder|DSPRegistration whereSectorId($value)
 * @method static Builder|DSPRegistration whereTIN($value)
 * @method static Builder|DSPRegistration whereUpdatedAt($value)
 * @method static Builder|DSPRegistration whereVillageId($value)
 * @method static Builder|DSPRegistration whereWebsite($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell|null $cell
 * @property-read \App\Models\District|null $district
 * @property-read \App\Models\Province|null $province
 * @property-read \App\Models\Sector|null $sector
 * @property-read \App\Models\Village|null $village
 */
class DSPRegistration extends BaseModel implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table = 'dsp_registrations';
    protected $dates = ['registration_date'];
    protected $guarded = [];

    public static function reset($clientId=null)
    {
        $clientId=$clientId??auth('client')->id();
        $model = DSPRegistration::whereHas('application', function (Builder $builder) use ($clientId) {
            $builder->where('client_id', '=', $clientId);
        })->first();

        $application = $model->application;

        $model->forceDelete();

        ApplicationCompletedProject::where('application_id', '=', $application->id)->delete();
        $solutions = ApplicationSolution::where('application_id', '=', $application->id);
        $solutions->each(function (ApplicationSolution $applicationSolution) {
            $applicationSolution->platformTypes()->detach();
        });
        $solutions->delete();

        $application->deleteRelated();

        $application->delete();

    }

    public function deleteRelated()
    {
        //TODO delete related
    }

    public function companyCategory(): BelongsTo
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id');
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }


}
