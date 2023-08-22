<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAdvocacy extends Model
{
    use HasFactory;

    protected $fillable = [
                 'category',
            'tags',
            'copy',
            'description',
            'existance',
            'attachment',
    ];
}
