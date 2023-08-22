<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\cell
 *
 * @property int $id
 * @property int $sector_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cell whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Village[] $villages
 * @property-read int|null $villages_count
 */
class Cell extends Model
{
    use HasFactory;

    public function villages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Village::class);
    }
}
