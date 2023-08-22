<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriantationItem extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'strategic_oriantation_id'];
}
