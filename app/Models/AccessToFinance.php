<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessToFinance extends Model
{
    use HasFactory;

    protected $fillable = [
            'description','image', 'access_to_finance_interest_id'
    ];

    protected $casts = [
        'access_to_finance_interest_id' => 'array',
    ];
}
