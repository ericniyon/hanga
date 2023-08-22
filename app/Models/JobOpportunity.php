<?php

namespace App\Models;

use App\Client;
use App\FileManager;
use Database\Factories\JobOpportunityFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\JobOpportunity
 *
 * @property int $id
 * @property string|null $logo
 * @property string|null $company_name
 * @property string|null $job_title
 * @property string|null $job_details
 * @property string|null $link
 * @property string|null $attachment
 * @property Carbon|null $deadline
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $grant
 * @property int|null $job_type_id
 * @property int|null $opportunity_type_id
 * @property bool $has_grant
 * @property int|null $client_id
 * @property string|null $expiration_date
 * @property string|null $required_experience
 * @property int|null $availability_type_id
 * @property int|null $availability_time
 * @property-read Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read AvailabilityType|null $availabilityTypes
 * @property-read Client|null $client
 * @property-read JobType|null $jobtype
 * @property-read Collection|StudyLevel[] $opportunityStudyLevel
 * @property-read int|null $opportunity_study_level_count
 * @property-read OpportunityType|null $opportunityType
 * @method static JobOpportunityFactory factory(...$parameters)
 * @method static Builder|JobOpportunity newModelQuery()
 * @method static Builder|JobOpportunity newQuery()
 * @method static Builder|JobOpportunity query()
 * @method static Builder|JobOpportunity whereAttachment($value)
 * @method static Builder|JobOpportunity whereAvailabilityTime($value)
 * @method static Builder|JobOpportunity whereAvailabilityTypeId($value)
 * @method static Builder|JobOpportunity whereClientId($value)
 * @method static Builder|JobOpportunity whereCompanyName($value)
 * @method static Builder|JobOpportunity whereCreatedAt($value)
 * @method static Builder|JobOpportunity whereDeadline($value)
 * @method static Builder|JobOpportunity whereExpirationDate($value)
 * @method static Builder|JobOpportunity whereGrant($value)
 * @method static Builder|JobOpportunity whereHasGrant($value)
 * @method static Builder|JobOpportunity whereId($value)
 * @method static Builder|JobOpportunity whereJobDetails($value)
 * @method static Builder|JobOpportunity whereJobTitle($value)
 * @method static Builder|JobOpportunity whereJobTypeId($value)
 * @method static Builder|JobOpportunity whereLink($value)
 * @method static Builder|JobOpportunity whereLogo($value)
 * @method static Builder|JobOpportunity whereOpportunityTypeId($value)
 * @method static Builder|JobOpportunity whereRequiredExperience($value)
 * @method static Builder|JobOpportunity whereUpdatedAt($value)
 * @mixin Eloquent
 * @property mixed $0
 * @property mixed $1
 */
class JobOpportunity extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;

    protected $fillable = ['opportunity_type_id',];
    protected $casts = ['deadline' => 'datetime', 'job_type_id', 'opportunity_type_id'];

    public function jobtype(): BelongsTo
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function opportunityType(): BelongsTo
    {
        return $this->belongsTo(OpportunityType::class, 'opportunity_type_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // public function getPhoto()
    // {
    //     if ($this->logo && $this->client_id==null) {
    //         return $this->client->profilePhotoUrl;
    //     }elseif($this->client_id){
    //         return $this->client->profilePhotoUrl;
    //     }else{
    //         return $this->client->profilePhotoUrl;

    //     }
    // }
    public function opportunityStudyLevel(): BelongsToMany
    {
        return $this->belongsToMany(StudyLevel::class, 'opportunity_study_levels', 'opportunity_id', 'study_level_id');
    }

    public function availabilityTypes(): BelongsTo
    {
        return $this->belongsTo(AvailabilityType::class, 'availability_type_id');
    }

    public function getJobOpportunityAttachment()
    {
        return Storage::url(FileManager::OPPORTUNITY_ATTACHMENT_PATH . $this->attachment);
    }

    public function getJobOpportunityLogo(): string
    {
        if ($this->logo)
            return Storage::url(FileManager::OPPORTUNITY_LOGO_PATH . $this->logo);
        return $this->client_id ? $this->client->profilePhotoUrl : asset('images/background.png');
    }

}
