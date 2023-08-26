<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupCompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [

        'client_id',
        'category_id',
        'sub_category_id',
        'company_name',
        'tin',
        'phone',
        'email',
        'location',
        'registration_date',
        'number_of_employee',
        'rdb_certificate',
        'website',
        'mission',
        'problem',
        'logo',
        'bio',
        
        'revenue_stream',
        'market_size',
        'fund_raising',
        'fund_raising_reason',
        'acheivement',
        'acheivement_date',
    ];
}
