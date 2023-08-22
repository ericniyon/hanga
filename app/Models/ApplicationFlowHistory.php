<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * App\Models\ApplicationFlowHistory
 *
 * @property int $id
 * @property int $application_id
 * @property string|null $comment
 * @property string|null $external_comment
 * @property string|null $attachment
 * @property string|null $external_attachment
 * @property string|null $status
 * @property bool $is_comment
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereExternalAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereExternalComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereIsComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationFlowHistory whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Cell $cell
 * @property-read \App\Models\District $district
 * @property-read string $status_color
 * @property-read \App\Models\Province $province
 * @property-read \App\Models\Sector $sector
 * @property-read \App\Models\Village $village
 */
class ApplicationFlowHistory extends ApplicationBaseModel implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded=[];
}
