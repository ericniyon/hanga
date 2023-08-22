<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'color', 'category', 'membership_packeges_id'
    ];

    public function items()
    {
        return $this->hasMany(BenefitItem::class, 'service_benefit_id', 'id');
    }
}
