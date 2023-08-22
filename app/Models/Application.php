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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property int|null $client_id
 * @property string $status
 * @property string|null $approval_date
 * @property string|null $submission_date
 * @property int|null $approved_by
 * @property string|null $rejected_date
 * @property int|null $rejected_by
 * @property int $current_step
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $last_return
 * @property string|null $review_decision
 * @property-read Collection|ApplicationSolution[] $applicationSolutions
 * @property-read int|null $application_solutions_count
 * @property-read Collection|ApplicationCompletedProject[] $completedProjects
 * @property-read int|null $completed_projects_count
 * @property-read string $status_color
 * @property-read Collection|ApplicationFlowHistory[] $history
 * @property-read int|null $history_count
 * @property mixed verification_requested
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 * @method static Builder|Application whereApprovalDate($value)
 * @method static Builder|Application whereApprovedBy($value)
 * @method static Builder|Application whereClientId($value)
 * @method static Builder|Application whereCreatedAt($value)
 * @method static Builder|Application whereCurrentStep($value)
 * @method static Builder|Application whereId($value)
 * @method static Builder|Application whereLastReturn($value)
 * @method static Builder|Application whereRejectedBy($value)
 * @method static Builder|Application whereRejectedDate($value)
 * @method static Builder|Application whereReviewDecision($value)
 * @method static Builder|Application whereStatus($value)
 * @method static Builder|Application whereSubmissionDate($value)
 * @method static Builder|Application whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $bio
 * @property string|null $document_vectors
 * @property int|null $company_category_id
 * @property bool $is_migrated
 * @property string|null $company_description
 * @property-read \App\Models\ApplicationAssignment|null $assignedUser
 * @property-read \App\Models\ApplicationAssignment|null $assignment
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read Collection|\App\Models\ApplicationBranch[] $branches
 * @property-read int|null $branches_count
 * @property-read Collection|\App\Models\BusinessSector[] $businessSectors
 * @property-read int|null $business_sectors_count
 * @property-read Collection|\App\Models\CompanyCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Cell $cell
 * @property-read Collection|\App\Models\CertificationAward[] $certificationAwards
 * @property-read int|null $certification_awards_count
 * @property-read Client|null $client
 * @property-read \App\Models\CompanyCategory|null $companyCategory
 * @property-read \App\Models\District $district
 * @property-read \App\Models\DSPRegistration|null $dspRegistrations
 * @property-read bool $can_update_info
 * @property-read Collection|\App\Models\ApplicationFlowHistory[] $histories
 * @property-read int|null $histories_count
 * @property-read \App\Models\IworkerRegistration|null $iWorkerRegistrations
 * @property-read Collection|\App\Models\ApplicationInterest[] $interests
 * @property-read int|null $interests_count
 * @property-read \App\Models\MSMERegistration|null $msmeRegistrations
 * @property-read \App\Models\Province $province
 * @property-read \App\Models\Sector $sector
 * @property-read Collection|\App\Models\Service[] $services
 * @property-read int|null $services_count
 * @property-read \App\Models\Village $village
 * @method static Builder|Application active()
 * @method static Builder|Application whereBio($value)
 * @method static Builder|Application whereCompanyCategoryId($value)
 * @method static Builder|Application whereCompanyDescription($value)
 * @method static Builder|Application whereDocumentVectors($value)
 * @method static Builder|Application whereIsMigrated($value)
 * @method static Builder|Application whereVerificationRequested($value)
 * @property int $verification_requested
 * @property-read \App\Models\DSPRegistration|null $dspRegistration
 * @property-read \App\Models\IworkerRegistration|null $iWorkerRegistration
 * @property-read \App\Models\MSMERegistration|null $msmeRegistration
 */
class Application extends ApplicationBaseModel implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    /**
     * function decrypt id on route model binding
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Application not found");
    }

    /**
     * function to return history of application
     */
    public function histories(): HasMany
    {
        return $this->hasMany(ApplicationFlowHistory::class);
    }

    /**
     * function to return solutions of application
     */
    public function applicationSolutions(): HasMany
    {
        return $this->hasMany(ApplicationSolution::class);
    }

    /**
     * function to return solutions of application
     */
    public function completedProjects(): HasMany
    {
        return $this->hasMany(ApplicationCompletedProject::class);
    }

    /**
     * function to return client of application
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * function to return user who is responsible for reviewing application
     */
    public function assignment(): HasOne
    {
        return $this->hasOne(ApplicationAssignment::class);
    }

    public function assignedUser(): HasOneThrough
    {
        return $this->hasOneThrough(ApplicationAssignment::class, User::class, "id", "assigned_to");
    }


    public function deleteRelated()
    {
        $this->histories()->forceDelete();
        $this->assignment()->delete();
        $this->certificationAwards()->delete();
        $this->services()->detach();
        $this->businessSectors()->detach();
        $this->categories()->detach();

        $this->interests()->delete();
    }

    public function certificationAwards(): HasMany
    {
        return $this->hasMany(CertificationAward::class);
    }


    public function businessSectors(): BelongsToMany
    {
        return $this->belongsToMany(BusinessSector::class, 'application_business_sector', 'application_id', 'business_sector_id')
        ;
    }

    public function getApplyUrl(): string
    {
        $type = $this->client->registrationType->name;
        if ($type == RegistrationType::DSP)
        {
            return route('client.dsp.application.form');
        }
        elseif ($type == RegistrationType::MSME)
        {
            return route('client.msme.application.form');
        }
        elseif ($type == RegistrationType::iWorker)
        {
            return route('client.iworker.application.form');
        }
        return '#';
    }

    public function detailsUrl(): string
    {
        $type = $this->client->registrationType->name;
        if ($type == RegistrationType::DSP)
        {
            return route('client.dsp.application.details', encryptId($this->id));
        }
        elseif ($type == RegistrationType::MSME)
        {
            return route('client.msme.application.details', encryptId($this->id));
        }
        elseif ($type == RegistrationType::iWorker)
        {
            return route('client.iworker.application.details', encryptId($this->id));

        }
        return '#';
    }

    public function branches(): HasMany
    {
        return $this->hasMany(ApplicationBranch::class);
    }

    public function iWorkerRegistrations(): HasOne
    {
        return $this->hasOne(IworkerRegistration::class);
    }

    public function iWorkerRegistration(): HasOne
    {
        return $this->hasOne(IworkerRegistration::class);
    }

    public function msmeRegistrations(): HasOne
    {
        return $this->hasOne(MSMERegistration::class);
    }

    public function msmeRegistration(): HasOne
    {
        return $this->hasOne(MSMERegistration::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, "application_service", "application_id")
            ->withTimestamps();
    }

    public function canBeEdited(): bool
    {
        if ($this->status == self::DRAFT)
        {
            return true;
        }
        return false;
    }

    public function canBeDeleted(): bool
    {
        if ($this->status == self::DRAFT)
        {
            return true;
        }
        return false;
    }

    public function getCanUpdateInfoAttribute(): bool
    {
        if (auth('client')->check())
        {
            return auth('client')->user()->id === $this->client_id;
        }

        return false;
    }

    public function companyCategory(): BelongsTo
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id');
    }

    public function dspRegistrations(): HasOne
    {
        return $this->hasOne(DSPRegistration::class);
    }

    public function dspRegistration(): HasOne
    {
        return $this->hasOne(DSPRegistration::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CompanyCategory::class, 'registration_categories', 'application_id', 'category_id');
    }


    public function scopeActive(Builder $builder)
    {
        $builder->whereHas('client', function (Builder $builder) {
            $builder->where('is_active', '=', true);
        });
    }

    public function interests(): HasMany
    {
        return $this->hasMany(ApplicationInterest::class, 'application_id');
    }

    public function isVerified(): bool
    {
        return $this->status == self::APPROVED;
    }


    public function advocacy(): BelongsTo
    {
        return $this->belongsTo(Advocacie::class, 'addressed_to');
    }

}
