<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ApplicationBaseModel
 *
 * @property-read string $status_color
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationBaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationBaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationBaseModel query()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell $cell
 * @property-read \App\Models\District $district
 * @property-read \App\Models\Province $province
 * @property-read \App\Models\Sector $sector
 * @property-read \App\Models\Village $village
 */
class ApplicationBaseModel extends BaseModel implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    //application statuses
    const DRAFT = "Draft";
    const SUBMITTED = "Submitted";
    const UNDER_REVIEW = "Under review";
    const REVIEWED = "Reviewed";
    const APPROVED = "Approved";
    const REJECTED = "Rejected";
    const SUSPENDED = "Suspended";
    const RETURN_BACK = "Returned back to applicant";
    const PROPOSE_TO_APPROVE = "Propose to approve";
    const PROPOSE_TO_RETURN_BACK = "Propose to returned back to applicant";
    const PROPOSE_TO_REJECT = "Propose to reject";
    const RETURN_BACK_TO_REVIEW="Returned back for review";

    /**
     * get application status for approval
    */
    public function getMyStatuses(): array
    {
        if (in_array($this->status, [self::UNDER_REVIEW])) {
            return [self::PROPOSE_TO_APPROVE, self::PROPOSE_TO_RETURN_BACK, self::PROPOSE_TO_REJECT];
        }
        if ($this->status == self::REVIEWED) {
            if (in_array($this->review_decision, [self::PROPOSE_TO_APPROVE])) {
                return [self::APPROVED,self::RETURN_BACK_TO_REVIEW];
            } else if (in_array($this->review_decision, [self::PROPOSE_TO_RETURN_BACK])) {
                return [self::RETURN_BACK,self::RETURN_BACK_TO_REVIEW];
            } else {
                return [self::REJECTED,self::RETURN_BACK_TO_REVIEW];
            }
        }
        return [];
    }
       /**
        * set color of application status
       */
    public function getStatusColorAttribute(): string
    {
        if (in_array($this->status, [self::PROPOSE_TO_APPROVE,self::UNDER_REVIEW])) {
            $statusColor = "info";
        } else if (in_array($this->status, [self::REJECTED, self::PROPOSE_TO_REJECT, self::SUSPENDED])) {
            $statusColor = "danger";
        } else if (in_array($this->status, [self::DRAFT, self::PROPOSE_TO_RETURN_BACK, self::RETURN_BACK,self::RETURN_BACK_TO_REVIEW])) {
            $statusColor = "warning";
        }else if (in_array($this->status, [self::REVIEWED,self::SUBMITTED])) {
            $statusColor = "primary";
        }else{
            $statusColor = "success";
        }
        return $statusColor;
    }

    public static function statuses(): array
    {
        return[
         self::SUBMITTED,
         self::UNDER_REVIEW,
         self::REVIEWED,
         self::APPROVED,
         self::RETURN_BACK,
         self::REJECTED,
         self::SUSPENDED
        ];
    }

    public function getMessageStatuses(): array
    {
        return [self::PROPOSE_TO_RETURN_BACK, self::PROPOSE_TO_REJECT, self::RETURN_BACK, self::REJECTED];
    }



}
