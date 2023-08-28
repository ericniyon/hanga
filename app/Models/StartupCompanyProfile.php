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
        'current_step',
        'pitch_deck',

        // business modesl
        'target_customers',
        'business_model',
        'revenue_stream',
        'customer_value',
        'gmt_channel',

        // traction
        'market_size_tam',
        'market_size_sam',
        'active_users',
        'paying_customers',
        'anual_recuring_revenue',
        'revenue_frequency',
        'customer_growth_rate',
        'gross_transaction_value',

        // FUNDRAISING
        'current_startup_stage',
        'previous_investment_size',
        'previous_investment_type',
        'target_investors',
        'target_investment_size',
        'fundraising_breakdown',
    ];
}
