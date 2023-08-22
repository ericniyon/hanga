<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\IworkerRegistration
 *
 * @property int $id
 * @property int $application_id
 * @property string|null $name
 * @property string|null $id_type
 * @property string|null $id_number
 * @property string|null $comp_date_of_registration
 * @property string|null $iworker_type
 * @property string|null $website
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $gender
 * @property string|null $physical_disability
 * @property string|null $profile_picture logo for company
 * @property string|null $dob
 * @property int|null $province_id
 * @property int|null $district_id
 * @property int|null $sector_id
 * @property int|null $cell_id
 * @property int|null $village_id
 * @property string|null $brief_bio company description
 * @property string|null $portfolio_link
 * @property int|null $income_range_id
 * @property bool|null $own_computer
 * @property bool|null $can_access_internet
 * @property string|null $digital_literacy
 * @property bool|null $can_attend_online_class
 * @property bool|null $has_bank_account
 * @property bool|null $credit_access
 * @property bool|null $has_digital_platform
 * @property bool|null $has_software_skills
 * @property int|null $level_of_study_id for individual
 * @property string|null $field_of_study for individual
 * @property string|null $supporting_document for individual
 * @property string|null $cp_crepresentative_name
 * @property string|null $cp_representative_email
 * @property string|null $cp_representative_phone
 * @property string|null $cp_representative_position
 * @property string|null $cp_representative_gender
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property mixed cp_representative_name
 * @method static Builder|IworkerRegistration newModelQuery()
 * @method static Builder|IworkerRegistration newQuery()
 * @method static Builder|IworkerRegistration query()
 * @method static Builder|IworkerRegistration whereApplicationId($value)
 * @method static Builder|IworkerRegistration whereBriefBio($value)
 * @method static Builder|IworkerRegistration whereCanAccessInternet($value)
 * @method static Builder|IworkerRegistration whereCanAttendOnlineClass($value)
 * @method static Builder|IworkerRegistration whereCellId($value)
 * @method static Builder|IworkerRegistration whereCompDateOfRegistration($value)
 * @method static Builder|IworkerRegistration whereCpCrepresentativeName($value)
 * @method static Builder|IworkerRegistration whereCpRepresentativeEmail($value)
 * @method static Builder|IworkerRegistration whereCpRepresentativeGender($value)
 * @method static Builder|IworkerRegistration whereCpRepresentativePhone($value)
 * @method static Builder|IworkerRegistration whereCpRepresentativePosition($value)
 * @method static Builder|IworkerRegistration whereCreatedAt($value)
 * @method static Builder|IworkerRegistration whereCreditAccess($value)
 * @method static Builder|IworkerRegistration whereDigitalLiteracy($value)
 * @method static Builder|IworkerRegistration whereDistrictId($value)
 * @method static Builder|IworkerRegistration whereDob($value)
 * @method static Builder|IworkerRegistration whereEmail($value)
 * @method static Builder|IworkerRegistration whereFieldOfStudy($value)
 * @method static Builder|IworkerRegistration whereGender($value)
 * @method static Builder|IworkerRegistration whereHasBankAccount($value)
 * @method static Builder|IworkerRegistration whereHasDigitalPlatform($value)
 * @method static Builder|IworkerRegistration whereHasSoftwareSkills($value)
 * @method static Builder|IworkerRegistration whereId($value)
 * @method static Builder|IworkerRegistration whereIdNumber($value)
 * @method static Builder|IworkerRegistration whereIdType($value)
 * @method static Builder|IworkerRegistration whereIncomeRangeId($value)
 * @method static Builder|IworkerRegistration whereIworkerType($value)
 * @method static Builder|IworkerRegistration whereLevelOfStudyId($value)
 * @method static Builder|IworkerRegistration whereName($value)
 * @method static Builder|IworkerRegistration whereOwnComputer($value)
 * @method static Builder|IworkerRegistration wherePhone($value)
 * @method static Builder|IworkerRegistration wherePhysicalDisability($value)
 * @method static Builder|IworkerRegistration wherePortfolioLink($value)
 * @method static Builder|IworkerRegistration whereProfilePicture($value)
 * @method static Builder|IworkerRegistration whereProvinceId($value)
 * @method static Builder|IworkerRegistration whereSectorId($value)
 * @method static Builder|IworkerRegistration whereSupportingDocument($value)
 * @method static Builder|IworkerRegistration whereUpdatedAt($value)
 * @method static Builder|IworkerRegistration whereVillageId($value)
 * @method static Builder|IworkerRegistration whereWebsite($value)
 * @mixin Eloquent
 * @property string|null $cp_representative_name
 * @property string|null $cp_description
 * @property string|null $logo
 * @property string|null $rdb_certificate
 * @property int|null $field_of_study_id
 * @property int|null $physical_disability_id
 * @property int|null $rep_physical_disability_id
 * @property-read \App\Models\Application $application
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell|null $cell
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IworkerCertificate[] $certificates
 * @property-read int|null $certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IworkerCompanyEmployee[] $companyEmployees
 * @property-read int|null $company_employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CreditSource[] $creditSources
 * @property-read int|null $credit_sources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DigitalPlatform[] $digitalPlatforms
 * @property-read int|null $digital_platforms_count
 * @property-read \App\Models\District|null $district
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IworkerExperience[] $experiences
 * @property-read int|null $experiences_count
 * @property-read \App\Models\FieldOfStudy|null $fieldOfStudy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IworkerDigitalPlatform[] $iWorkerDigitalPlatforms
 * @property-read int|null $i_worker_digital_platforms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PaymentMethod[] $paymentMethods
 * @property-read int|null $payment_methods_count
 * @property-read \App\Models\PhysicalDisability|null $physicalDisability
 * @property-read \App\Models\Province|null $province
 * @property-read \App\Models\PhysicalDisability|null $repPhysicalDisability
 * @property-read \App\Models\Sector|null $sector
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\IworkerSoftSkill[] $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\StudyLevel|null $studyLevel
 * @property-read \App\Models\Village|null $village
 * @method static Builder|IworkerRegistration whereCpDescription($value)
 * @method static Builder|IworkerRegistration whereCpRepresentativeName($value)
 * @method static Builder|IworkerRegistration whereFieldOfStudyId($value)
 * @method static Builder|IworkerRegistration whereLogo($value)
 * @method static Builder|IworkerRegistration wherePhysicalDisabilityId($value)
 * @method static Builder|IworkerRegistration whereRdbCertificate($value)
 * @method static Builder|IworkerRegistration whereRepPhysicalDisabilityId($value)
 */
class IworkerRegistration extends BaseModel implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $dates = ['comp_date_of_registration', 'dob'];
    protected $casts = [
        'digital_literacy' => 'array'
    ];

    protected $guarded = [];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function creditSources(): BelongsToMany
    {
        return $this->belongsToMany(CreditSource::class, 'iworker_registration_credit_source');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'iworker_registration_service');
    }

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'iworker_registration_payment_method');
    }

    public function digitalPlatforms(): BelongsToMany
    {
        return $this->belongsToMany(DigitalPlatform::class, 'iworker_registration_digital_platform');
    }

    public function iWorkerDigitalPlatforms(): HasMany
    {
        return $this->hasMany(IworkerDigitalPlatform::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(IworkerSoftSkill::class, 'iworker_registration_iworker_soft_skill');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(IworkerCertificate::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(IworkerExperience::class);
    }


    public function companyEmployees(): HasMany
    {
        return $this->hasMany(IworkerCompanyEmployee::class);
    }

    public function studyLevel(): BelongsTo
    {
        return $this->belongsTo(StudyLevel::class, 'level_of_study_id');
    }

    public static function reset($clientId = null)
    {
        $clientId = $clientId ?? auth('client')->id();
        $model = IworkerRegistration::whereHas('application', function (Builder $builder) use ($clientId) {
            $builder->where('client_id', '=', $clientId);
        })->first();

        $application = $model->application;

        $model->digitalPlatforms()->detach();
        $model->paymentMethods()->detach();
        $model->companyEmployees()->delete();
        $model->creditSources()->detach();
        $model->skills()->detach();
        $model->certificates()->delete();
        $model->experiences()->delete();
        $model->delete();

        $application->branches()->delete();
        $application->deleteRelated();
        $application->delete();

    }

    public function fieldOfStudy(): BelongsTo
    {
        return $this->belongsTo(FieldOfStudy::class, 'field_of_study_id');
    }

    public function physicalDisability(): BelongsTo
    {
        return $this->belongsTo(PhysicalDisability::class, 'physical_disability_id');
    }

    public function repPhysicalDisability(): BelongsTo
    {
        return $this->belongsTo(PhysicalDisability::class, 'rep_physical_disability_id');
    }




}
