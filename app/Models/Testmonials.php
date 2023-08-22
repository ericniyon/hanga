<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testmonials extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'emaail',
        'phone',
        'status',
        'message'
    ];
}
