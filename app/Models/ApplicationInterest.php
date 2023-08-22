<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ApplicationInterest
 *
 * @property int $id
 * @property int $application_id
 * @property int $category_id
 * @property int $registration_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompanyCategory $category
 * @property-read \App\Models\RegistrationType $registrationType
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereRegistrationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApplicationInterest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApplicationInterest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CompanyCategory::class);
    }

    public function registrationType(): BelongsTo
    {
        return $this->belongsTo(RegistrationType::class);
    }
}
