<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;

    protected $fillable = [
            'resource_title',
            'resource_link',
            'resource_cover',
            'resource_category',
            'resource_field',
            'resource_description',
    ];
}
