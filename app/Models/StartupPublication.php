<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'url',
        'title',
        'type',
    ];
}
