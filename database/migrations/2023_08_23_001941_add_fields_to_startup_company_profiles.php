<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStartupCompanyProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('startup_company_profiles', function (Blueprint $table) {
            //
            $table->text('target_customers')->nullable();
            $table->string('business_model')->nullable();
            $table->string('revenue_stream')->nullable();
            $table->text('customer_value')->nullable();
            $table->string('gmt_channel')->nullable();
            $table->date('acheivement_date')->nullable();
            // 
            $table->string('market_size_tam')->nullable();
            $table->string('market_size_sam')->nullable();
            $table->string('market_size_som')->nullable();
            $table->string('active_users')->nullable();
            $table->string('paying_customers')->nullable();
            $table->string('anual_recuring_revenue')->nullable();
            $table->string('revenue_frequency')->nullable();
            $table->string('customer_growth_rate')->nullable();
            $table->string('gross_transaction_value')->nullable();
            // 
            $table->string('current_startup_stage')->nullable();
            $table->string('previous_investment_size')->nullable();
            $table->string('previous_investment_type')->nullable();
            $table->string('target_investors')->nullable();
            $table->string('target_investment_size')->nullable();
            $table->string('fundraising_breakdown')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('startup_company_profiles', function (Blueprint $table) {
            //
        });
    }
}
