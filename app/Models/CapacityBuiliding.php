<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacityBuiliding extends Model
{
    use HasFactory;


    protected $fillable = [
        'description', 'image', 'capacity_builiding_items'
    ];

    protected $casts = [
        'capacity_builiding_items' => 'array',
    ];
}
