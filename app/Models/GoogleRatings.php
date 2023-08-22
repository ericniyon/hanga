<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleRatings extends Model
{
    use HasFactory;


    public function GoogleReverse()
    {
        return $this->hasMany(GoogleRevers::class);
    }
}
