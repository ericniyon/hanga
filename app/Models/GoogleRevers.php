<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleRevers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'cuastomer_rating',
        'review_date',
        'feedback',
        'google_rating'
    ];

    public function google_revers()
    {
        return $this->belongsTo(GoogleRatings::class, 'google_rating');
    }
}
