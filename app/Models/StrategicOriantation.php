<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicOriantation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'color', 'membership_packeges_id'
    ];

    public function items()
    {
        return $this->belongsTo(OriantationItem::class, 'strategic_oriantation_id', 'id');
    }
}
